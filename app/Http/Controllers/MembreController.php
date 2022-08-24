<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Backtrace\File;
class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminDashboard.Forms.addMem');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Membre::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'cin'=>$data['cin'],
            'numpassport' => $data['numpassport'],
            'cnrps'=> $data['cnrps'],
            'gender'=> $data['gender'],
            'grade'=>$data['grade'],
            'mail'=>$data['mail'],
            'mdp'=>$data['mdp'],
            'photo'=>$data['photo'],
            'specialite'=>$data['specialite'],
            'diplome'=>$data['diplome'],
            'date'=>$data['date'],
            'fctadmin'=>$data['fctadmin'],
            'scopus'=>$data['scopus'],
            'orcid'=>$data['orcid'],
            'tel'=>$data['tel'],
            'telfax'=>$data['telfax'],
            'datediplome'=>$data['datediplome']
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
            "nom"=>"required",
            "prenom" => "required",
            "cin" => "",
            "numpassport"=>"",
            "cnrps" =>"",
            "gender" => "in:feminin,masculin",
            "grade"=>"in:Professeur,Maître de conférence,Docteur,Chercheur en thèse,Chercheur en mastère,Ingénieur,Assistant,Maître Assistant,Autre",
            "mail"=>"required",
            "mdp"=>"required",
            "photo" => "file|mimes:jpeg,png|max:5000",
            "specialite"=>"",
            "diplome"=>"",
            "date" => "",
            "fctadmin"=>"",
            "scopus"=>"",
            "orcid"=>"",
            "tel"=>"",
            "telfax"=>"",
            "datediplome"=>"",
        ]);
        if($request->hasFile('photo'))
            {
                $photoname = uniqid() . '_' . time(). '.' . $request->photo->extension();
                $path = public_path() .'/membre_images';
                $request->photo->move($path, $photoname);
                $photo = $photoname;
            }else{
            $photo = '--';
            }
        $membre= new Membre();
        $membre->nom = $request->nom;
        $membre->prenom = $request->prenom;
        $membre->cin = $request->cin;
        $membre->numpassport = $request->numpassport ;
        $membre->cnrps = $request -> cnrps;
        $membre->gender = $request->input('gender');
        $membre-> grade = $request-> input('grade');
        $membre->mail = $request->mail;
        $membre->mdp = $request->mdp; 
        $membre->photo = $photo;
        $membre-> specialite= $request->specialite;
        $membre->  diplome= $request-> diplome;
        $membre->date = $request->date;
        $membre->fctadmin = $request->fctadmin;
        $membre-> scopus= $request-> scopus;
        $membre->orcid =$request->orcid;
        $membre->tel=$request->tel;
        $membre->telfax = $request->telfax;
        $membre->datediplome = $request -> datediplome;
        $membre->save();
       
        return redirect('membreManager')->with('status', 'membre was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function show(Membre $membre)
    {
       $membres = Membre::all();
       return view ('AdminDashboard.Fonctionnalites.membreManager',compact('membres'));
    }
    function deleteMembre(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Membre::find($request->id)->delete();
        return back()
            ->with('success', 'Membre deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function editMembre($id)
    {
        $membres = Membre::find($id);
        return view('AdminDashboard.UpdatedForms.editMem',compact('membres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membre $membre)
    {      $id=$request->id;
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $cin = $request->input('cin');
        $numpassport = $request->input('numpassport');
        $cnrps = $request -> input('cnrps');
        $gender = $request->input('gender');
        $grade = $request-> input('grade');
        $mail = $request->input('mail');
        $specialite= $request->input('specialite');
        $diplome= $request-> input('diplome');
        $date = $request->input('date');
        $fctadmin = $request->input('fctadmin');
        $scopus= $request-> input('scopus');
        $orcid =$request->input('orcid');
        $tel=$request->input('tel');
        $telfax = $request->input('telfax');
        $datediplome = $request -> input('datediplome');
        $isUpdateSuccess= Membre::where('id',$id) ->update([ 'nom'=>$nom,
                                                                'prenom'=>$prenom,
                                                                'cin'=>$cin,
                                                                'numpassport'=>$numpassport,
                                                                'cnrps'=>$cnrps,
                                                                'gender'=>$gender,
                                                                'grade'=>$grade,
                                                                'mail'=>$mail,
                                                                'specialite'=>$specialite,
                                                                'diplome'=>$diplome,
                                                                'date'=>$date,
                                                                'fctadmin'=>$fctadmin,
                                                                'scopus'=>$scopus ,
                                                                'orcid'=>$orcid  ,
                                                                'tel'=>$tel  ,
                                                                'telfax'=>$telfax  ,
                                                                'datediplome'=>$datediplome  ,
                                                            ]);
        return redirect('membreManager')->with('status', 'Membre was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membre $membre)
    {
        //
    }
}
