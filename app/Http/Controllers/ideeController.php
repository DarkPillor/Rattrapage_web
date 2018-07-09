<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
Use App\Activity;
Use App\Vote;
Use Auth;

class ideeController extends Controller
{
  public function index()
  {
    // Ici on liste la totalité des idées
      $activitys=\App\Activity::where('validate','=','0')->orderBy('id', 'desc')->get();
      $type_id = Auth::user()->type;
      return view('listIdee',compact('activitys', 'type_id' ));
  }
  public function avert()
  {
    // Ici on liste la totalité des idées
      $activitys=\App\Activity::where('validate','=','0')->orderBy('id', 'desc')->get();
      $type_id = Auth::user()->type;
      return view('listIdee',compact('activitys', 'type_id' ));
  }
}
