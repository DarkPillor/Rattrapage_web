<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
Use App\Activity;
Use App\Vote;
Use Auth;

class ideeController extends Controller
{
  // public function index()
  // {
  //     $today = date("Y-m-d");
  //   // Ici on liste la totalité des activités passée
  //     $activitys=\App\Activity::where('validate','=','1')where('date','>',$today)->orderBy('id', 'desc')->get();
  //     $type_id = Auth::user()->type;
  //     return view('pastactivity',compact('activitys', 'type_id' ));
  // }
}
