<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Activity;

class ideeController extends Controller
{
  public function index()
  {
      $activitys=\App\Activity::where('validate','=','0')->get();
      return view('listIdee',compact('activitys'));
  }
}
