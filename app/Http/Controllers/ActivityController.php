<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

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
        $activity= new Activity;
        $activity->Name_Activity = $request->get('Name_Activity');
        $activity->Description_activity = $request->get('Description_activity');
        $activity->Repeat_activity = $request->get('Repeat_activity');
        $activity->Date_activity = $request->get('Date_activity');
        $activity->Time_activity = $request->get('Time_activity');
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
    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('editActivity',compact('activity'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activity= Activity::find($id);
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
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        return redirect('activitys')->with('success','Information has been  deleted');
    }


}
