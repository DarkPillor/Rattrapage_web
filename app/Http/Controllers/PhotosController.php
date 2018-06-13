<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Activity;
use Auth;

class PhotosController extends Controller
{
  // public function index($id)
  // {
  //     $activity = Activity::find($id);
  //     return view('indexPhoto',compact('activity', 'id'));
  // }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, $id)
  {
    $photo = new Photo;
    $request->validate([
            'photo' => 'required|file|max:1024',
        ]);
    $fileName = "photo".time().'.'.request()->photo->getClientOriginalExtension();
    $request->photo->storeAs('logos',$fileName);
    $activity_id= Activity::find($id);
    $id1 = Auth::user()->id;
    $photo->user_id = $id1;
    $photo->activities_id = $id;
    $photo->photo = $fileName;
    $photo->save();

      return redirect('activitys')->with('success', 'Information has been added');
  }
}
