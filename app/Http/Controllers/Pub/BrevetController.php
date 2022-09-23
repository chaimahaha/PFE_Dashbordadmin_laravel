<?php

namespace App\Http\Controllers\Pub;

use App\Models\Brevet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BrevetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $brevets=DB::table('brevets')->paginate(3);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.Forms.Posts.brevet',compact('brevets'));}
        else return view('MembreDashboard.Forms.Posts.brevet',compact('brevets'));
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
            "annee"=>"required",
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
        $brevet-> annee = $request->annee;;
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
    function deleteBrevet(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Brevet::find($request->id)->delete();
        return back()
            ->with('success', 'Brevet deleted successfully');
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
    public function editBrevet($id)
    {
        $brevets = Brevet::find($id);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editBrevet',compact('brevets'));}
        else return view('MembreDashboard.UpdatedForms.editBrevet',compact('brevets'));
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
        $id=$request->id;
        $titre = $request->input('titre');
        $annee = $request->input('annee');
        $auteur = $request->input('auteur');
        $mail = $request->input('mail');
        $auteurex = $request->input('auteurex');
        $mailex = $request->input('mailex');
        $sujet = $request->input('sujet');
        $date = $request->input('date');
        $isUpdateSuccess= Brevet::where('id',$id) ->update([ 'titre'=>$titre,
                                                                'annee'=>$annee,
                                                                'auteur'=>$auteur,
                                                                'mail'=>$mail,
                                                                'auteurex'=>$auteurex,
                                                                'mailex'=>$mailex,
                                                                'sujet'=>$sujet,
                                                                'date'=>$date,
                                                            ]);
        return redirect('postsManager')->with('status', 'Brevet was updated');
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
