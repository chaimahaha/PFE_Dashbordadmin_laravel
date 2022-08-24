<?php

namespace App\Http\Controllers\Pub;

use App\Models\ChapitreOuv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ChapitreOuvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.Forms.Posts.chapitre');}
        else  return view('MembreDashboard.Forms.Posts.chapitre');
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
    
            $chapitre = new ChapitreOuv();
            $chapitre->annee = $request->annee; ;       
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
    function deleteChapitre(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        ChapitreOuv::find($request->id)->delete();
        return back()
            ->with('success', 'Chapitre  deleted successfully');
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
    public function editChapitre($id)
    {
        $chapitres = ChapitreOuv::find($id);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editChapitre',compact('chapitres'));
        } else return view('MembreDashboard.UpdatedForms.editChapitre',compact('chapitres'));
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
        $isUpdateSuccess= ChapitreOuv::where('id',$id) ->update([   'annee'=>$annee,
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
        return redirect('postsManager')->with('status', 'Chapitre was updated');
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
