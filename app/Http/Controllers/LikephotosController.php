<?php

namespace App\Http\Controllers;
Use Auth;
Use App\LikePhoto;

use Illuminate\Http\Request;

class LikephotosController extends Controller
{
  public function update($id)
  {
    $id1 = Auth::user()->id;
    $test = LikePhoto::where('photo_id', $id)->where('user_id', $id1)->get();
    foreach($test as $marcheputain){
        If($marcheputain['user_id'] == $id1){
          $test = false;
        } else{
          $test = true;
          };
      };
      if($test == true){
        $like = new LikePhoto;
        $like->user_id = $id1;
        $like->photo_id = $id;
        $like->save();
        return redirect()->back()->with('success','OUI');
      } else{
        return redirect()->back()->with('success','C FO CONNARD');
      }

    return redirect('activitys')->with('success', 'Information has been added');
  }
  public function show($id)
{
  $id1 = Auth::user()->id;
  LikePhoto::where('photo_id', $id)->where('user_id', $id1)->delete();
  return redirect('activitys')->with('success','Information has been  deleted');
}



}
