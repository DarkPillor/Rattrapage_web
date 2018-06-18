<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use Auth;

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
        $id = Auth::user()->id;
        $activity->user_id = $id;
        $activity->name = $request->get('name');
        $activity->validate = $request->get('validate');
        $activity->description = $request->get('description');
        $activity->repeat = $request->get('repeat');
        $activity->date = $request->get('date');
        $activity->time = $request->get('time');
        $activity->save();
      //  $id = Auth::user()->id;
      //  $activity->Id

        return redirect('activitys')->with('success', 'Information has been added');
    }
    public function index()
    {
        $activitys=\App\Activity::where('validate','=','1')->get();
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
        return view('editActivity',compact('activity', 'id'));
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
        $activity->name=$request->get('name');
        $activity->description=$request->get('description');
        $activity->repeat=$request->get('repeat');
        $activity->date=$request->get('date');
        $activity->time=$request->get('time');
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
