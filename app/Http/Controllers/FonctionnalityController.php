<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FonctionnalityController extends Controller
{
    public function user_manager(){
        return view('Fonctionnalites.userManager');
    }
    public function posts_manager(){
        return view('Fonctionnalites.postsManager');
    }
    public function inscription_manager(){
        return view('Fonctionnalites.inscriptionManager');
    }
    public function actuality_manager(){
        return view('Fonctionnalites.actualityManager');
    }
    public function demand_Manager(){
        return view('Fonctionnalites.demandManager');
    }
    public function contents_manager(){
        return view('Fonctionnalites.contentsManager');
    }
    public function event_manager(){
        return view('Fonctionnalites.eventManager');
    }

}
