<?php

namespace App\Http\Controllers\Prod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\These;
use Illuminate\Http\Request;

class TheseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.Products.these');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
       return These::create([
            'titre'=>$data['titre'],
            'annee'=>$data['annee'],
            'file'=>$data['file'],
            'sujet'=>$data['sujet'],
            'anneeinscrip'=>$data['anneeinscrip'],
            'encadrant'=>$data['encadrant'],
            'mail_encadrant'=>$data['mail_encadrant'],
            'encadrant_2'=>$data['encadrant_2'],
            'mail_encadrant_2'=>$data['mail_encadrant_2'],
            'cotutelle'=>$data['cotutelle'],

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
            "annee"=>"in:2022",
            "file" => "required|mimes:pdf|max:10000",
            "sujet" => "required",
            "anneeinscrip"=>"required",
            "encadrant"=>"required",
            "mail_encadrant"=>"required",
            "encadrant_2"=>"required",
            "mail_encadrant_2"=>"required",
            "cotutelle"=>"in:non cotutelle,cotutelle",

        ]);
        if($request->hasfile('file'))
            {
                $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
                $path = public_path() .'/these_file';
                $request->file->move($path, $filename);
                $file = $filename;
            }else{
            $file = '--';
            }
        $these= new These();
        $these->titre = $request->titre;
        $these->annee = $request->input('annee');
        $these->file = $file;
        $these->sujet = $request->sujet;
        $these-> anneeinscrip= $request->anneeinscrip;
        $these-> encadrant = $request->encadrant ;
        $these-> mail_encadrant = $request-> mail_encadrant;
        $these-> encadrant_2 = $request-> encadrant_2;
        $these-> mail_encadrant_2= $request->mail_encadrant_2;
        $these->cotutelle = $request->input('cotutelle');
        $these->save();
        return redirect('these')->with('status', 'these was created');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\These  $these
     * @return \Illuminate\Http\Response
     */
    public function show(These $these)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\These  $these
     * @return \Illuminate\Http\Response
     */
    public function edit(These $these)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\These  $these
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, These $these)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\These  $these
     * @return \Illuminate\Http\Response
     */
    public function destroy(These $these)
    {
        //
    }
}
