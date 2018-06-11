<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
  public function store(Request $request)
  {
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    $photo= new Activity;
    /*Pour récupérer l'image */
    $file = $request->file('filename');
    $name=time().$file->getClientOriginalName();
    $file->move(public_path().'/images/', $name);
    /*Récupération de l'id de l'utilisateur*/
    $id = Auth::id();
    $photo->id_user = $id;
    $photo->filename =$name;
    $photo->save();

      //return redirect('activities')->with('success', 'Information has been added');
  }
}
