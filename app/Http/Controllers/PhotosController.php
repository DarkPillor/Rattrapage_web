<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Photo;
use App\Activity;
use Auth;
use Illuminate\Support\Facades\Storage;;

class PhotosController extends Controller
{
  public function edit($id)
  {
      $activity = Activity::find($id);
      return view('editActivity',compact('activity', 'id'));
  }
  public function update(Request $request, $id)
  {
    $photo = new Photo;
    $request->validate([
            'photo' => 'required|file|max:1024',
        ]);
    $fileName = "photo".time().'.'.request()->photo->getClientOriginalExtension();
    $request->photo->storeAs('public/storage', $fileName);
    $activity_id= Activity::find($id);
    $id1 = Auth::user()->id;
    $photo->user_id = $id1;
    $photo->activities_id = $id;
    $photo->photo = $fileName;
    $photo->save();

      return redirect('activitys')->with('success', 'Information has been added');
  }
  public function show($id)
  {
    //$activity = Activity::find($id);select('photo')->
    $photo = DB::table('photos')->where('activities_id','=', $id)->get();
    return view('listPhoto',compact('photo', 'id' ));
  }
}
