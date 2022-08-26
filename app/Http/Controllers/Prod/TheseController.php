<?php

namespace App\Http\Controllers\Prod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\These;
use App\Models\Pfe;
use App\Models\habilitation;
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TheseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.Forms.Products.these');}
        else return view('MembreDashboard.Forms.Products.these');

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
            "annee"=>"required",
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
        $these->annee = $request->annee;
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
    function deleteThese(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        These::find($request->id)->delete();
        return back()
            ->with('success', 'These deleted successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\These  $these
     * @return \Illuminate\Http\Response
     */
    public function show(These $these)
    {
        $theses = These::all();
        $pfes=Pfe::all();
        $habilitations = habilitation::all();
        $masters = Master::all();
        if (Auth::user()-> is_admin ) {
        return View('AdminDashboard.Fonctionnalites.productionManager',compact('theses','pfes','habilitations','masters'));
        } else return View('MembreDashboard.Fonctionnalites.productionManager',compact('theses','pfes','habilitations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\These  $these
     * @return \Illuminate\Http\Response
     */
    public function editThese($id)
    {
        $theses = These::find($id);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editThese',compact('theses'));
        } else return view('MembreDashboard.UpdatedForms.editThese',compact('theses'));
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
        $id=$request->id;
        $titre = $request->input('titre');
        $annee = $request->input('annee');
        $sujet = $request->input('sujet');
        $anneeinscrip = $request->input('anneeinscrip');
        $encadrant = $request->input('encadrant');
        $mail_encadrant = $request->input('mail_encadrant');
        $encadrant_2 = $request->input('encadrant_2');
        $mail_encadrant_2 = $request->input('mail_encadrant_2');
        $cotutelle = $request->input('cotutelle');
        $isUpdateSuccess= These::where('id',$id) ->update([ 'titre'=>$titre,
                                                                'annee'=>$annee,
                                                                'sujet'=>$sujet,
                                                                'anneeinscrip'=>$anneeinscrip,
                                                                'encadrant'=>$encadrant,
                                                                'mail_encadrant'=>$mail_encadrant,
                                                                'encadrant_2'=>$encadrant_2,
                                                                'mail_encadrant_2'=>$mail_encadrant_2,
                                                                'cotutelle'=>$cotutelle
                                                            ]);
        return redirect('productionManager')->with('status', 'These was updated');
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
