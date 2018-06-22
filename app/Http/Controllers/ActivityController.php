<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
use App\Activity;
use Auth;

class ActivityController extends Controller
{
  public function create()
  {
    $type_id = Auth::user()->type;
      return view('createActivity', compact('type_id'));
  }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Fonction qui va stocké l'activitée
        $activity= new Activity;
        $id = Auth::user()->id;
        $activity->user_id = $id;
        $activity->name = $request->get('name');
        $activity->description = $request->get('description');
        $activity->cost = $request->get('cost');
        $activity->repeat = $request->get('repeat');
        $activity->date = $request->get('date');
        $activity->time = $request->get('time');
        $activity->save();


        return redirect('activitys')->with('success', 'Information has been added');
    }
    public function index()
    {
        // Cette fonction va afficher les activitées qui seront valide
        $activitys=\App\Activity::where('validate','=','1')->orderBy('id', 'desc')->get();
        // On va calculer le jour actuel
        $today = date("Y-m-d");
        // On détermine le type d'utilisateur
        $type_id = Auth::user()->type;
        return view('indexActivity',compact('activitys', 'today', 'type_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // On détermine le type d'utilisateur
        $type_id = Auth::user()->type;
        // Ici on souhaite savoir si c'est un administrateur qui va executer la commande
        if($type_id == 1){
          $activity = Activity::find($id);
          return view('editActivity',compact('activity', 'id', 'type_id'));
        } else {
          //Si c'est pas le cas il seras retourné sur la page d'activité
          $today = date("Y-m-d");
          $activitys=\App\Activity::where('validate','=','1')->orderBy('id', 'desc')->get();
          $type_id = Auth::user()->type;
          return view('indexActivity',compact('activitys', 'today', 'type_id'));
        }

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
      // Ici on va modifier l'idée ou l'activitée
        $activity= Activity::find($id);
        $activity->name=$request->get('name');
        $activity->description=$request->get('description');
        $activity->validate = $request->get('validate');
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
      //On détermine si c'est un administrateur execute la commande
      //Si c'est le cas il peut supprimer l'idée ou l'activité
      //Dans le cas contraire il se verra renvoyer sur la page activité
      $type_id = Auth::user()->type;
      if($type_id == 1){
        $activity = Activity::find($id);
        $activity->delete();
        return redirect('activitys')->with('success','Information has been  deleted');
      } else {
        $today = date("Y-m-d");
        $activitys=\App\Activity::where('validate','=','1')->orderBy('id', 'desc')->get();
        $type_id = Auth::user()->type;
        return view('indexActivity',compact('activitys', 'today', 'type_id'));
      }

    }


}
