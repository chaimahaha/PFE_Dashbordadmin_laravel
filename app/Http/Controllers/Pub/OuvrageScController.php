<?php

namespace App\Http\Controllers\Pub;

use App\Models\OuvrageSc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class OuvrageScController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.Posts.ouvrage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return OuvrageSc::create([
            'annee'=>$data['annee'],
            'auteur'=>$data['auteur'],
            'mail'=>$data['mail'],
            'auteurex'=>$data['auteurex'],
            'mailex'=>$data['mailex'],
            'titre'=>$data['titre'],
            'editeur'=>$data['editeur'],
            'lien'=>$data['lien'],
            'edition'=>$data['edition'],
            'isbn'=>$data['isbn'],
            'date'=>$data['date'],
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        "annee"=>"in:2022",
        "auteur"=>"required",
        "mail"=>"required",
        "auteurex"=>"required",
        "mailex"=>"required",
        "titre"=>"required",
        "editeur"=>"required",
        "lien"=>"required",
        "edition"=>"required",
        "isbn"=>"required",
        "date"=>"required",        
       ]);

        $ouvrage = new OuvrageSc();
        $ouvrage->annee =$request->input('annee') ;       
        $ouvrage->auteur =$request-> auteur;
        $ouvrage->mail=$request->mail ;
        $ouvrage->auteurex =$request->auteurex ;
        $ouvrage->mailex=$request->mailex ;
        $ouvrage->titre =$request->titre ;
        $ouvrage->editeur =$request->editeur ;
        $ouvrage->lien =$request-> lien;
        $ouvrage->edition =$request->edition ;
        $ouvrage->isbn =$request->isbn ;
        $ouvrage->date =$request->date ;
        $ouvrage->save();
        return redirect('ouvrage')->with('status', 'ouvrage was created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OuvrageSc  $ouvrageSc
     * @return \Illuminate\Http\Response
     */
    public function show(OuvrageSc $ouvrageSc)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OuvrageSc  $ouvrageSc
     * @return \Illuminate\Http\Response
     */
    public function edit(OuvrageSc $ouvrageSc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OuvrageSc  $ouvrageSc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OuvrageSc $ouvrageSc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OuvrageSc  $ouvrageSc
     * @return \Illuminate\Http\Response
     */
    public function destroy(OuvrageSc $ouvrageSc)
    {
        //
    }
}
