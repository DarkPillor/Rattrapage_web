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
    $counts = DB::table('likephotos')->where('photo_id','=',$id)->count();
    $photos = \App\Photo::where('id','=',$id)->get();

    $comments = DB::table('commentaires')
              ->join('users', 'commentaires.user_id', '=', 'users.id')
              ->select('users.name','users.firstname', 'commentaires.description','commentaires.created_at' )
              ->where('photo_id', '=', $id)
              ->orderBy('commentaires.id', 'desc')
              ->get();

      return view('CommentPhoto',compact('photos', 'id', 'counts', 'comments'));
  }
}
