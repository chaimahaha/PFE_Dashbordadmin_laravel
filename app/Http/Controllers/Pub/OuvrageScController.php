<?php

namespace App\Http\Controllers\Pub;

use App\Models\OuvrageSc;
use App\Models\ArticleSc;
use App\Models\Brevet;
use App\Models\ChapitreOuv;
use App\Models\Conference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OuvrageScController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ouvrages=DB::table('ouvrage_scs')->paginate(3);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.Forms.Posts.ouvrage',compact('ouvrages'));
       
    } else return view('MembreDashboard.Forms.Posts.ouvrage',compact('ouvrages'));
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
        "annee"=>"required",
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
        $ouvrage->annee = $request->annee; ;       
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
    function deleteOuvrage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        OuvrageSc::find($request->id)->delete();
        return back()
            ->with('success', 'Ouvrage deleted successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OuvrageSc  $ouvrageSc
     * @return \Illuminate\Http\Response
     */
    public function show(OuvrageSc $ouvrageSc)
    {
        $articles = ArticleSc::all();
        $brevets = Brevet :: all();
        $chapitres = ChapitreOuv::all();
        $conferences = Conference :: all();
        $ouvrages = OuvrageSc :: all();
        if (Auth::user()-> is_admin ) {
        return View('AdminDashboard.Fonctionnalites.postsManager',compact('articles','brevets','chapitres','conferences','ouvrages'));
    }
    else return View('MembreDashboard.Fonctionnalites.postsManager',compact('articles','brevets','chapitres','conferences','ouvrages'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OuvrageSc  $ouvrageSc
     * @return \Illuminate\Http\Response
     */
    public function editOuvrage($id)
    {
        $ouvrages = OuvrageSc::find($id);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editOuv',compact('ouvrages'));}
        else return view('MembreDashboard.UpdatedForms.editOuv',compact('ouvrages'));
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
        $id=$request->id;
        $annee = $request->input('annee');
        $auteur = $request->input('auteur');
        $mail = $request->input('mail');
        $auteurex = $request->input('auteurex');
        $mailex = $request->input('mailex');
        $titre = $request->input('titre');
        $editeur = $request->input('editeur');
        $lien = $request->input('lien');
        $edition = $request->input('edition');
        $isbn = $request->input('isbn');
        $date = $request->input('date');
        $isUpdateSuccess= OuvrageSc::where('id',$id) ->update([   'annee'=>$annee,
                                                                    'auteur'=>$auteur,
                                                                    'mail'=>$mail,
                                                                    'auteurex'=>$auteurex,
                                                                    'mailex'=>$mailex,
                                                                    'titre'=>$titre,
                                                                    'editeur'=>$editeur,
                                                                    'lien'=>$lien,
                                                                    'edition'=>$edition,
                                                                    'isbn'=>$isbn,
                                                                    'date'=>$date,
                                                            ]);
        return redirect('postsManager')->with('status', 'Ouvrage was updated');
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
