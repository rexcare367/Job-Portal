<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
  public function search(Request $request) {
    $term = $request->term;

    $data = Skill::where('name', 'LIKE', "%{$term}%")->limit(6)->get(['id as value', 'name as tag']);

    return response()->json([
      'suggestions' => $data
    ]);
  }
}
