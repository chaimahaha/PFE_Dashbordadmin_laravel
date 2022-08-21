<?php

namespace App\Http\Controllers\Prod;;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Pfe;
use Illuminate\Http\Request;

class PfeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.Products.pfe');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Pfe::create([
            'titre'=>$data['titre'],
            'file'=>$data['file'],
            'description'=>$data['description'],
            'encadrant'=>$data['encadrant'],
            'mail_encadrant'=>$data['mail_encadrant'],
            'encadrant_2'=>$data['encadrant_2'],
            'mail_encadrant_2'=>$data['mail_encadrant_2'],
            'institut'=>$data['institut'],
            'etudiant'=>$data['etudiant'],
            'date_start'=>$data['date_start'],
            'date_end'=>$data['date_end']
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
            "file" => "required|mimes:pdf|max:10000",
            "description"=>"required",
            "encadrant"=>"required",
            "mail_encadrant"=>"required",
            "encadrant_2"=>"required",
            "mail_encadrant_2"=>"required",
            "institut"=>"required",
            "etudiant"=>"required",
            "date_start"=>"",
            "date_end"=>"",

        ]);
        if($request->hasfile('file'))
            {
                $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
                $path = public_path() .'/PFE_file';
                $request->file->move($path, $filename);
                $file = $filename;
            }else{
            $file = '--';
            }
        $pfe= new Pfe();
        $pfe->titre = $request->titre;
        $pfe->file = $file;
        $pfe->description = $request->description;
        $pfe-> encadrant = $request->encadrant ;
        $pfe-> mail_encadrant = $request-> mail_encadrant;
        $pfe-> encadrant_2 = $request-> encadrant_2;
        $pfe-> mail_encadrant_2= $request->mail_encadrant_2;
        $pfe-> institut= $request->institut;
        $pfe->  etudiant = $request->etudiant;
        $pfe->date_start = $request->date_start;
        $pfe-> date_end= $request->date_end;
        $pfe->save();
        return redirect('pfe')->with('status', 'PFE was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function show(Pfe $pfe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function edit(Pfe $pfe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pfe $pfe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pfe  $pfe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pfe $pfe)
    {
        //
    }
}
