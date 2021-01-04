<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
  public function index()
  {
    //$jobColumns = ['id', 'title', 'type', 'city_id', 'deadline', 'monthly_salary_min', 'monthly_salary_max', 'created_at', 'gender', 'company_name', 'slug'];
    $jobs = Job::latest()->with(['city:cities.id,name', 'category:categories.id,name'])->active()->paginate(10);
    //return $jobs;
    if (Auth::check()) {
      if (Auth::user()->hasRole('user')) {
        return view('auth.landing', compact('jobs'));
      } else {
        return view('admin.landing');
      }
    } else {
      return view('landing');
    }
  }

  public function search(Request $request)
  {
    $keywords = $request->keywords;
    $location = $request->location;
    return $request;
  }

  public function jobSkillSearch(Request $request)
  {
    $term = strtolower($request->term);
    if (!$term) abort(404);
    $jobs = Job::active()->with('skills:id,name')->where('title', 'like', '%' . $term . '%')
      ->orWhereHas('skills', function ($query) use ($term) {
        $query->where('name', 'like', '%' . $term . '%');
      })
      ->orderBy('id')->limit(8)->get(['id', 'title']);

    // define an empty array
    $searches = [];

    // loop through all jobs
    foreach ($jobs as $job) {
      if (strpos(strtolower($job->title), $term)) {
        $searches[] = strtolower($job->title);
      }

      foreach ($job->skills as $skill) {
        $skills = $skill->name;
        $searches[] = strtolower($skills);
      }
    }

    $search_data = !empty($searches) ? array_unique($searches) : [];
    if (!empty($search_data)) {
      $searches = [];
      foreach ($search_data as $data) {
        // echo strtolower($data) . "\n";
        if (strpos($data, $term) !== false) {
          $searches[] = Str::limit($data, 20);
        }
      }
    }

    return $searches;
  }

  public function jobCitySearch(Request $request)
  {
    $term = strtolower($request->term);
    if (!$term) abort(404);
    $jobs = Job::active()->with(['city:cities.id,name'])
      ->whereHas('city', function ($query) use ($term) {
        $query->where('name', 'like', '%' . $term . '%');
      })
      ->orderBy('id')->limit(8)->get(['id', 'city_id']);

    // define an empty array
    $searches = [];

    // loop through all jobs
    foreach ($jobs as $job) {
      if (strpos(strtolower($job->city), $term)) {
        $searches[] = $job->city->name;
      }
    }

    $searches = !empty($searches) ? $searches : [];

    return $searches;
  }

  public function job(Job $job, Request $request)
  {
    $jobs = Job::active()->latest()->paginate(10);
    //return $job;
    return view('job.show', compact('job', 'jobs'));
  }

  public function apply($job_id, User $user, Request $request)
  {

    $profile = $user->profile;
    $resume = $request->file('resume');
    $allowed_extensions = ['doc', 'docx', 'pdf', 'jpg', 'jpeg'];

    if ($resume && in_array($resume->getClientOriginalExtension(), $allowed_extensions)) {
      // make the unique name for the image
      $currentDate = Carbon::now()->toDateString();
      $cvName = $currentDate . '-' . uniqid() . '.' . $resume->getClientOriginalExtension();

      if (!Storage::disk('public')->exists('cv')) {
        Storage::disk('public')->makeDirectory('cv');
      }

      if (!Storage::disk('public')->exists('resume')) {
        Storage::disk('public')->makeDirectory('resume');
      }

      // delete old cv
      if (Storage::disk('public')->exists('cv/' . $profile->cv)) {
        Storage::disk('public')->delete('cv/' . $profile->cv);
      }

      if (Storage::disk('public')->exists('resume/' . $profile->cv)) {
        Storage::disk('public')->delete('resume/' . $profile->cv);
      }

      $resume->storeAs('cv', $cvName, 'public');
      $resume->storeAs('resume', $cvName, 'public');
      // Storage::disk('public')->put('cv/' . $cvName, $cv);
    } else {
      $cvName = $profile->cv;
    }

    $profile->cv = $cvName;
    $profile->save();

    $application = new Application();
    $application->user_id = $user->id;
    $application->job_id = $job_id;
    $application->email = $request->email;
    $application->phone = $request->phone;
    $application->resume = $cvName;
    $application->save();

    return redirect()->route('welcome')->with('success', 'Application saved');
  }
}
