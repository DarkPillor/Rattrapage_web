<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Vote;
use Auth;

class VoteController extends Controller
{
  public function edit($id)
  {
      $activity = Activity::find($id);
      return view('voteActivity',compact('activity', 'id'));
  }
  public function update(Request $request, $id)
  {
    $vote = new Vote;
    $activity_id= Activity::find($id);
    $id1 = Auth::user()->id;
    $vote->user_id = $id1;
    $vote->activities_id = $id;
    $vote->time = $request->get('time');
    $vote->save();
    return redirect('activitys')->with('success', 'Information has been added');
  }
  public function destroy($id)
  {
    $id1 = Auth::user()->id;
    Vote::where('activities_id', $id)->where('user_id', $id1)->delete();
    return redirect('activitys')->with('success','Information has been  deleted');
  }

}
