<?php

namespace App\Http\Controllers\Prod;
use Illuminate\Support\Facades\Validator;
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()-> is_admin ) 
        return view('AdminDashboard.Forms.Products.master');
        else return view('MembreDashboard.Forms.Products.master');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Master::create([
            'titre'=>$data['titre'],
            'annee'=>$data['annee'],
            'file'=>$data['file'],
            'description'=>$data['description'],
            'encadrant'=>$data['encadrant'],
            'mail_encadrant'=>$data['mail_encadrant'],
            'encadrant_2'=>$data['encadrant_2'],
            'mail_encadrant_2'=>$data['mail_encadrant_2'],
            'institut'=>$data['institut'],
            'etudiant'=>$data['etudiant'],
            'date_start '=>$data['date_start '],
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
            "annee"=>"required",
            "file" => "required|mimes:pdf|max:10000",
            "description"=>"required",
            "encadrant"=>"required",
            "mail_encadrant"=>"required",
            "encadrant_2"=>"required",
            "mail_encadrant_2"=>"required",
            "institut"=>"required",
            "etudiant"=>"required",
            "date_start "=>"",
            "date_end "=>"",

        ]);
        if($request->hasfile('file'))
            {
                $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
                $path = public_path() .'/Master_file';
                $request->file->move($path, $filename);
                $file = $filename;
            }else{
            $file = '--';
            }
        $master= new Master();
        $master->titre = $request->titre;
        $master->annee = $request->annee;
        $master->file = $file;
        $master->description = $request->description;
        $master-> encadrant = $request->encadrant ;
        $master-> mail_encadrant = $request-> mail_encadrant;
        $master-> encadrant_2 = $request-> encadrant_2;
        $master-> mail_encadrant_2= $request->mail_encadrant_2;
        $master-> institut= $request->institut;
        $master-> etudiant = $request->etudiant;
        $master->date_start = $request->date_start;
        $master-> date_end= $request->date_end;
        $master->save();
        return redirect('master')->with('status', 'Master was created');
    }
    function deleteMaster(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Master::find($request->id)->delete();
        return back()
            ->with('success', 'Master deleted successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $Master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $Master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $Master
     * @return \Illuminate\Http\Response
     */
    public function editMaster($id)
    {
         $masters = Master::find($id);
         if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editMaster',compact('masters'));
         } else return view('MembreDashboard.UpdatedForms.editMaster',compact('masters'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master  $Master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $Master)
    {
        $id=$request->id;
        $titre = $request->input('titre');
        $annee = $request->input('annee');
        $description = $request->input('description');
        $encadrant = $request->input('encadrant');
        $mail_encadrant = $request->input('mail_encadrant');
        $encadrant_2 = $request->input('encadrant_2');
        $mail_encadrant_2 = $request->input('mail_encadrant_2');
        $institut=$request->input('institut');
        $etudiant=$request->input('etudiant');
        $date_start=$request->input('date_start');
        $date_end=$request->input('date_end');
        $isUpdateSuccess= Master::where('id',$id) ->update([   'titre'=>$titre,
                                                            'annee'=>$annee,
                                                            'description'=>$description,
                                                            'encadrant'=>$encadrant,
                                                            'mail_encadrant'=>$mail_encadrant,
                                                            'encadrant_2'=>$encadrant_2,
                                                            'mail_encadrant_2'=>$mail_encadrant_2,
                                                            'institut'=>$institut,
                                                            'etudiant'=>$etudiant,
                                                            'date_start'=>$date_start,
                                                            'date_end'=>$date_end,
                                                            ]);
        return redirect('productionManager')->with('status', 'Master was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $Master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $Master)
    {
        //
    }
}
