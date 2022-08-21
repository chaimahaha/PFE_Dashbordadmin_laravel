<?php

namespace App\Http\Controllers\Pub;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Forms.Posts.conference');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Conference::create([
            'annee'=>$data['annee'],
            'titre'=>$data['titre'],
            'date'=>$data['date'],
            'file'=>$data['file'],
            'auteur'=>$data['auteur'],
            'mail'=>$data['mail'],
            'auteurex'=>$data['auteurex'],
            'mailex'=>$data['mailex'],
            'confname'=>$data['confname'],
            'class ' => $data['class'],
          
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
            "titre"=>"required",
            "date"=>"",
            "file"=>"required|mimes:pdf,doc,docx|max:10000", 
            "auteur"=>"required",
            "mail"=>"required",
            "auteurex"=>"required",
            "mailex"=>"required",
            "confname"=>"required",
            "class"=>"in:a,b,c,internationale"       
           ]);
           if($request->hasfile('file'))
           {
               $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
               $path = public_path() .'/conference_file';
               $request->file->move($path, $filename);
               $file = $filename;
           }else{
           $file = '--';
           }
            $conference = new Conference();
            $conference->annee =$request->input('annee') ;
            $conference->titre =$request->titre ; 
            $conference->date =$request->date ;
            $conference->file =$file ;      
            $conference->auteur =$request-> auteur;
            $conference->mail=$request->mail ;
            $conference->auteurex =$request->auteurex ;
            $conference->mailex=$request->mailex ;
            $conference->confname =$request-> confname;
            $conference->class = $request->input('class');
            $conference->save();
            return redirect('conference')->with('status', 'conference was created');
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function show(Conference $conference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conference $conference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conference $conference)
    {
        //
    }
}
