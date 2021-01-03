<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
  public function index()
  {
    $jobColumns = ['id', 'title', 'type', 'city_id', 'deadline', 'monthly_salary_min', 'monthly_salary_max', 'created_at', 'gender'];
    $jobs = Job::with(['city:cities.id,name'])->active()->get($jobColumns);
    if(Auth::check()) {
      return view('auth.landing', $jobs);
    } else {
      return view('landing');
    }
  }

  public function search(Request $request) {
    return $request;
  }
}
