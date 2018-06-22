<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //On va afficher la liste des activités que l'utilisateur courant à l'acceuil
      $id = Auth::user()->id;
      $today = date("Y-m-d");
      $activitys = DB::table('registers')
                ->join('users', 'registers.user_id', '=', 'users.id')
                ->join('activities','registers.activities_id', '=', 'activities.id' )
                ->select('activities.id', 'activities.name','activities.description',
                'activities.description','activities.date', 'activities.time',
                'activities.cost')
                ->where('registers.user_id', '=', $id)
                ->get();
        return view('home', compact('activitys', 'today'));
    }
    public function generatePDF()

    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('listRegister', $data);
        return $pdf->download('hdtuto.pdf');

    }
}
