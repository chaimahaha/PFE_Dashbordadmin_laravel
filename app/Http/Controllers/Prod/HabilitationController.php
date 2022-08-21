<?php

namespace App\Http\Controllers\Prod;;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\habilitation;
use Illuminate\Http\Request;

class HabilitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.Products.habilitation');
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
            "annee"=>"in:2022",
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
        $hab->annee = $request->input('annee');
        $hab->file = $file;
        $hab-> encadrant = $request->encadrant ;
        $hab-> mail_encadrant = $request-> mail_encadrant;
        $hab->date = $request->date;
        $hab->save();
        return redirect('hab')->with('status', 'Habilitation was created');
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
    public function edit(habilitation $habilitation)
    {
        //
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
        //
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
