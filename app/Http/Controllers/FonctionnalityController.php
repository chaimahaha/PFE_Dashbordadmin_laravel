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
    public function manifestation_manager(){
        return view('Fonctionnalites.manifestationManager');
    }
    public function actuality_manager(){
        return view('Fonctionnalites.actualityManager');
    }
    public function domain_Manager(){
        return view('Fonctionnalites.domainManager');
    }
    public function membre_manager(){
        return view('Fonctionnalites.membreManager');
    }
    public function event_manager(){
        return view('Fonctionnalites.eventManager');
    }
    public function cooperation_manager(){
        return view('Fonctionnalites.cooperationManager');
    }
    public function production_manager(){
        return view('Fonctionnalites.productionManager');
    }

}
