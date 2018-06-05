<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
  public function create()
  {
      return view('createActivity');
  }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity= new \App\Activity;
        $activity->Name_Activity=$request->get('Name_Activity');
        $activity->Description_activity=$request->get('Description_activity');
        $activity->Repeat_activity=$request->get('Repeat_activity');
        $activity->Date_activity=$request->get('Date_activity');
        $activity->Time_activity=$request->get('Time_activity');
        $activity->save();
      //  $id = Auth::user()->id;
      //  $activity->Id

        //return redirect('activities')->with('success', 'Information has been added');
    }
    public function index()
    {
        $activitys=\App\Activity::all();
        return view('indexActivity',compact('activitys'));
    }

}
