<?php

namespace App\Http\Controllers\Prod;;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Pfe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PfeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()-> is_admin ) 
        return view('AdminDashboard.Forms.Products.pfe');
        else return view('MembreDashboard.Forms.Products.pfe');
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
        $pfe-> etudiant = $request->etudiant;
        $pfe->date_start = $request->date_start;
        $pfe-> date_end= $request->date_end;
        $pfe->save();
        return redirect('pfe')->with('status', 'PFE was created');
    }
    function deletePfe(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Pfe::find($request->id)->delete();
        return back()
            ->with('success', 'PFE deleted successfully');
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
    public function editPfe($id)
    {
         $pfes = Pfe::find($id);
         if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editpfe',compact('pfes'));
         } else return view('MembreDashboard.UpdatedForms.editpfe',compact('pfes'));

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
        $id=$request->id;
        $titre = $request->input('titre');
        $description = $request->input('description');
        $encadrant = $request->input('encadrant');
        $mail_encadrant = $request->input('mail_encadrant');
        $encadrant_2 = $request->input('encadrant_2');
        $mail_encadrant_2 = $request->input('mail_encadrant_2');
        $institut=$request->input('institut');
        $etudiant=$request->input('etudiant');
        $date_start=$request->input('date_start');
        $date_end=$request->input('date_end');
        $isUpdateSuccess= Pfe::where('id',$id) ->update([   'titre'=>$titre,
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
        return redirect('productionManager')->with('status', 'PFE was updated');
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
