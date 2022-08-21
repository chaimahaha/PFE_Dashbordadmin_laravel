<?php

namespace App\Http\Controllers\Pub;

use App\Models\Brevet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class BrevetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.Posts.brevet');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Brevet::create([
            'titre' => $data['titre'],
            'annee' => $data['annee'],
            'auteur'=>$data['auteur'],
            'mail'=>$data['mail'],
            'auteurex'=>$data['auteurex'],
            'mailex'=>$data['mailex'],
            'file'=>$data['file'],
            'sujet'=>$data['sujet'],
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
            "titre" => "required",
            "annee"=>"in:2022",
            "auteur" => "required",
            "mail"=>"required",
            "auteurex"=>"required",
            "mailex"=>"required",
            "file" => "required|mimes:pdf,doc,docx|max:10000",
            "sujet"=>"required",
            "date" => "",

        ]);
        if($request->hasfile('file'))
            {
                $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
                $path = public_path() .'/brevet_file';
                $request->file->move($path, $filename);
                $file = $filename;
            }else{
            $file = '--';
            }
        $brevet= new Brevet();
        $brevet->titre = $request->titre;
        $brevet-> annee = $request->input('annee');
        $brevet-> auteur = $request->auteur;
        $brevet-> mail = $request->mail;
        $brevet-> auteurex = $request->auteurex ;
        $brevet-> mailex = $request-> mailex;
        $brevet-> file = $file;
        $brevet-> sujet= $request-> sujet;
        $brevet->date = $request->date;
        $brevet->save();
        return redirect('brevet')->with('status', 'brevet was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brevet  $brevet
     * @return \Illuminate\Http\Response
     */
    public function show(Brevet $brevet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brevet  $brevet
     * @return \Illuminate\Http\Response
     */
    public function edit(Brevet $brevet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brevet  $brevet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brevet $brevet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brevet  $brevet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brevet $brevet)
    {
        //
    }
}
