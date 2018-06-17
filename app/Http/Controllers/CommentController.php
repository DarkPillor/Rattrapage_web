<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Commentaire;
Use App\Photo;
use App\Activity;

use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function update(Request $request, $id)
  {
    $comment = new Commentaire;
    $id1 = Auth::user()->id;
    $comment->user_id = $id1;
    $comment->photo_id = $id;
    $comment->description = $request->get('description');
    $comment->save();
    return redirect('activitys')->with('success', 'Information has been added');
  }
  public function edit($id)
  {
    //$photo = Photo::find($id);
    $photos = \App\Photo::where('id','=',$id)->get();
    $comments=\App\Commentaire::where('photo_id','=',$id)->get();
      return view('CommentPhoto',compact('photos', 'id', 'comments'));
  }
}
