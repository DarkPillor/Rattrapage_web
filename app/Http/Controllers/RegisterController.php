<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
Use Auth;
Use App\Register;
use App\Activity;
use App\User;

class RegisterController extends Controller
{
  public function edit($id)
  {
      $activity = Activity::find($id);
      return view('register',compact('activity', 'id'));
  }
  public function update(Request $request, $id)
  {
    $register = new Register;
    $id1 = Auth::user()->id;
    $register->user_id = $id1;
    $register->activities_id = $id;
    $register->payed = $request->get('payed');
    $register->save();
    return redirect('activitys')->with('success', 'Information has been added');
  }
  public function destroy($id)
  {
    $id1 = Auth::user()->id;
    Register::where('activities_id', $id)->where('user_id', $id1)->delete();
    return redirect('activitys')->with('success','Information has been  deleted');
  }
  public function show($id)
  {
        $users = DB::table('registers')
                  ->join('users', 'registers.user_id', '=', 'users.id')
                  ->select('users.name','users.firstname', 'registers.payed')
                  ->where('activities_id', '=', $id)
                  ->get();
      return view('listRegister',compact('users'));
  }
}
