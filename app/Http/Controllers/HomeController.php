<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('vitrin');
    }
    public function profile(){

       if (Auth::user()-> is_admin ) {
        return view ('AdminDashboard.NotifProfil.profil');
        }
        else 
        return view ('MembreDashboard.Fonctionnalites.profile');
    }
   
}
