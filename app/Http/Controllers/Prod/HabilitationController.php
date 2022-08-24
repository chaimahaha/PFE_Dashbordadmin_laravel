<?php

namespace App\Http\Controllers\Prod;;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\habilitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HabilitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.Forms.Products.habilitation');
    }
    else return view ('MembreDashboard.Forms.Products.habilitation');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return habilitation::create([
            'titre'=>$data['titre'],
            'nom'=>$data['nom'],
            'annee'=>$data['annee'],
            'file'=>$data['file'],
            'encadrant'=>$data['encadrant'],
            'mail_encadrant'=>$data['mail_encadrant'],
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
        $request ->validate([
            "titre" => "required",
            "nom" => "required",
            "annee"=>"required",
            "file" => "required|mimes:pdf|max:10000",
            "encadrant"=>"required",
            "mail_encadrant"=>"required",
            "date"=>"",

        ]);
        if($request->hasfile('file'))
            {
                $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
                $path = public_path() .'/habilitation_file';
                $request->file->move($path, $filename);
                $file = $filename;
            }else{
            $file = '--';
            }
        $hab= new habilitation();
        $hab->titre = $request->titre;
        $hab->nom = $request->nom;
        $hab->annee = $request->annee;
        $hab->file = $file;
        $hab-> encadrant = $request->encadrant ;
        $hab-> mail_encadrant = $request-> mail_encadrant;
        $hab->date = $request->date;
        $hab->save();
        return redirect('hab')->with('status', 'Habilitation was created');
    }
    function deleteHabilitation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        habilitation::find($request->id)->delete();
        return back()
            ->with('success', 'Habilitation deleted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\habilitation  $habilitation
     * @return \Illuminate\Http\Response
     */
    public function show(habilitation $habilitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\habilitation  $habilitation
     * @return \Illuminate\Http\Response
     */
    public function editHabilitation($id)
    {
        $habilitations = habilitation::find($id);
        if(Auth::user()->is_admin)
        return view('AdminDashboard.UpdatedForms.editHab',compact('habilitations'));
        else  return view('MembreDashboard.UpdatedForms.editHab',compact('habilitations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\habilitation  $habilitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, habilitation $habilitation)
    {
        $id=$request->id;
        $titre = $request->input('titre');
        $nom = $request->input('nom');
        $annee=$request->input('annee');
        $encadrant = $request->input('encadrant');
        $mail_encadrant = $request->input('mail_encadrant');
        $date = $request->input('date');
       
        $isUpdateSuccess= habilitation::where('id',$id) ->update([ 'titre'=>$titre,
                                                                'nom'=>$nom,
                                                                'annee'=>$annee,
                                                                'encadrant'=>$encadrant,
                                                                'mail_encadrant'=>$mail_encadrant,
                                                                'date'=>$date,
                                                              
                                                            ]);
        return redirect('productionManager')->with('status', 'Habilitation was updated');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\habilitation  $habilitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(habilitation $habilitation)
    {
        //
    }
}
