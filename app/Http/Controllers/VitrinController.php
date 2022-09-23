<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domaine;
use App\Models\Brevet;
use App\Models\ChapitreOuv;
use App\Models\Conference;
use App\Models\OuvrageSc;
use App\Models\ArticleSc;
use App\Models\Publication;
use App\Models\Cooperation;
use App\Models\These;
use App\Models\Pfe;
use App\Models\habilitation;
use App\Models\Master;
use App\Models\Manifestation;
use App\Models\Formation;
use App\Models\Event;
use App\Models\Actuality;
class VitrinController extends Controller
{
    public function show(Domaine $domaine)
    {
        $domaines = Domaine::all();

        return View('theme',compact('domaines'));
    }
    public function showPub(){
        $articles = ArticleSc::all();
        $brevets = Brevet::all();
        $ouvrages = OuvrageSc::all();
        $chapitres = ChapitreOuv::all();
        $conferences = Conference::all();
        return View('pub',compact('articles','brevets','ouvrages','chapitres','conferences'));
    }
    public function showProd(){
        $theses = These::all();
        $pfes=Pfe::all();
        $habilitations = habilitation::all();
        $masters = Master::all();
        $cooperations = Cooperation::all();
        return View('prodcop',compact('theses','pfes','habilitations','masters','cooperations'));
    }
    public function showManif()
    {
        $manifestations = Manifestation::all();
        $formations = Formation::all();
        $events = Event::all();
        return View('manif',compact('manifestations','formations','events'));
    }
    public function showActuality()
    {
        $actualities = Actuality::all();

        return View('actualites',compact('actualities'));
    }
}