<?php

namespace App\Http\Controllers\Pub;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences=DB::table('conferences')->paginate(3);
        if (Auth::user()-> is_admin ) {
        return view ('AdminDashboard.Forms.Posts.conference',compact('conferences'));
        }
        else return view ('MembreDashboard.Forms.Posts.conference',compact('conferences'));
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
            "annee"=>"required",
            "titre"=>"required",
            "date"=>"",
            "file"=>"required|mimes:pdf,doc,docx|max:10000", 
            "auteur"=>"required",
            "mail"=>"required",
            "auteurex"=>"required",
            "mailex"=>"required",
            "confname"=>"required",
            "class"=>"in:a,b,c,Internationale"     
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
           //$count = count($request->auteur);
          // $count2 = count($request->auteurex);

            $conference = new Conference();
            $conference->annee = $request->annee; ;
            $conference->titre =$request->titre ; 
            $conference->date =$request->date ;
            $conference->file =$file ; 
            //for ($i=0; $i < $count; $i++) {      
            $conference->auteur =$request-> auteur;
            $conference->mail=$request->mail ;
            //}
            //for ($i=0; $i < $count2; $i++) { 
            $conference->auteurex =$request->auteurex ;
            $conference->mailex=$request->mailex ;
            //}
            $conference->confname =$request-> confname;
            $conference->class = $request->input('class');
            $conference->save();
            
            return redirect('conference')->with('status', 'conference was created');
    
    
    }
    function deleteconference(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Conference::find($request->id)->delete();
        return back()
            ->with('success', 'Conference deleted successfully');
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
    public function editConference($id)
    {
        $conferences = Conference::find($id);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editConference',compact('conferences'));}
        else return view('MembreDashboard.UpdatedForms.editConference',compact('conferences'));
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
        $id=$request->id;
        $annee = $request->input('annee');
        $titre = $request->input('titre');
        $date = $request->input('date');
        $auteur = $request->input('auteur');
        $mail =$request->input('mail');
        $auteurex = $request->input('auteurex');
        $confname = $request->input('confname');
        $class = $request->input('class');
        $isUpdateSuccess= Conference::where('id',$id) ->update([ 'annee'=>$annee,
                                                                'titre'=>$titre,
                                                                'date'=>$date,
                                                                'auteur'=>$auteur,
                                                                'mail'=>$mail,
                                                                'auteurex'=>$auteurex,
                                                                'confname'=>$confname,
                                                                'class'=>$class
                                                            ]);
        return redirect('postsManager')->with('status', 'Conference was updated');
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
