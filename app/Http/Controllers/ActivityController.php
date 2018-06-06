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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_activity)
    {
        $activity = \App\Activity::find($Id_activity);
        return view('editActivity',compact('activity','Id_activity'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_activity)
    {
        $activity= \App\Activity::find($Id_activity);
        $activity->Name_Activity=$request->get('Name_Activity');
        $activity->Description_activity=$request->get('Description_activity');
        $activity->Repeat_activity=$request->get('Repeat_activity');
        $activity->Date_activity=$request->get('Date_activity');
        $activity->Time_activity=$request->get('Time_activity');
        $activity->save();
        return redirect('activitys');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_activity)
    {
        $activity = \App\Activity::find($Id_activity);
        $activity->delete();
        return redirect('activitys')->with('success','Information has been  deleted');
    }


}
