<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Activity;
use App\Vote;
use Auth;
Use DB;

class VoteController extends Controller
{
  public function edit($id)
  {
    //redirection sur la page de vote
      $activity = Activity::find($id);
      return view('voteActivity',compact('activity', 'id'));
  }
  public function update(Request $request, $id)
  {
    //C'est ici qu'on envoie les données lorsqu'un utilisateur vote
    //On vérifie si l'utilisateur à déjà voté pour cet activité
    //Si c'est le cas il est redirigé vers la liste des idées
    $activity_id= Activity::find($id);
    $id1 = Auth::user()->id;
    $test = Vote::where('activities_id', $id)->where('user_id', $id1)->get();
    foreach($test as $marcheputain){
        If($marcheputain['user_id'] == $id1){
          $test = false;
        } else{
          $test = true;
          };
      };
      if($test == true){
        $vote = new Vote;
        $vote->user_id = $id1;
        $vote->activities_id = $id;
        $vote->time = $request->get('time');
        $vote->save();
        return redirect()->back()->with('success','OUI');
      } else{
        return redirect('idee')->with('success','C FO CONNARD');
      }
}
  public function destroy($id)
  {
    //C'est ici qu'on suprime un vote lié à une activité
    $id1 = Auth::user()->id;
    Vote::where('activities_id', $id)->where('user_id', $id1)->delete();
    return redirect('idee')->with('success','Information has been  deleted');
  }

}
