<?php

namespace App\Http\Controllers\Pub;

use App\Models\ChapitreOuv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class ChapitreOuvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.Posts.chapitre');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return ChapitreOuv::create([
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
    
            $chapitre = new ChapitreOuv();
            $chapitre->annee =$request->input('annee') ;       
            $chapitre->auteur =$request-> auteur;
            $chapitre->mail=$request->mail ;
            $chapitre->auteurex =$request->auteurex ;
            $chapitre->mailex=$request->mailex ;
            $chapitre->titre =$request->titre ;
            $chapitre->editeur =$request->editeur ;
            $chapitre->lien =$request-> lien;
            $chapitre->edition =$request->edition ;
            $chapitre->isbn =$request->isbn ;
            $chapitre->date =$request->date ;
            $chapitre->save();
            return redirect('chapitre')->with('status', 'chapitre was created');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChapitreOuv  $chapitreOuv
     * @return \Illuminate\Http\Response
     */
    public function show(ChapitreOuv $chapitreOuv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChapitreOuv  $chapitreOuv
     * @return \Illuminate\Http\Response
     */
    public function edit(ChapitreOuv $chapitreOuv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChapitreOuv  $chapitreOuv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChapitreOuv $chapitreOuv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChapitreOuv  $chapitreOuv
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChapitreOuv $chapitreOuv)
    {
        //
    }
}
