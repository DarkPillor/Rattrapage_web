<?php

namespace App\Http\Controllers;
Use Auth;
Use App\LikePhoto;

use Illuminate\Http\Request;

class LikephotosController extends Controller
{
  public function update($id)
  {
    $like = new LikePhoto;
    $id1 = Auth::user()->id;
    $like->user_id = $id1;
    $like->photo_id = $id;
    $like->isLike = '1';
    $like->save();
    return redirect('activitys')->with('success', 'Information has been added');
  }
  public function show($id)
{
  $id1 = Auth::user()->id;
  $like = LikePhoto::where('photo_id', $id)->where('user_id', $id1)->delete();
  return redirect('activitys')->with('success','Information has been  deleted');
}



}
