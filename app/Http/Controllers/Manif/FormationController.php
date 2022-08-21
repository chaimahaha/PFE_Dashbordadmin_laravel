<?php

namespace App\Http\Controllers\Manif;
use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.addForm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)

    {
        return Formation::create([
            'titre' => $data['titre'],
            'lieu'=>$data['lieu'],
            'formateur' => $data['formateur'],
            'prix' => $data['prix'],
            'date_start' => $data['date_start'],
            'date_end' => $data['date_end']
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
            "lieu" => "required",
            "formateur" => "required",
            "prix" => "required",
            "date_start" => "",
            "date_end" => "",

        ]);
        $forma = new Formation();
        //$image = "image".uniqid().'.'.$request->file('image')->extension();
        //$request->file('image')->storeAs("public/forma_image",$image);
        $forma->titre = $request->titre;
        $forma->lieu = $request->lieu;
        $forma->formateur = $request->formateur;
        $forma->prix = $request->prix;
        $forma->date_start = $request->date_start;
        $forma->date_end = $request->date_end;
        $forma->save();
        return redirect('manifestationManager')->with('status', 'Training was created');
    }
    function deleteFormation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Formation::find($request->id)->delete();
        return back()
            ->with('success', 'Formation deleted successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function editFormation($id)
    {
       
        $formations = Formation::find($id);
        return view('UpdatedForms.editForm',compact('formations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id=$request->id;
        $titre = $request->input('titre');
        $lieu = $request->input('lieu');
        $formateur = $request->input('formateur');
        $prix = $request->input('prix');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $isUpdateSuccess= Formation::where('id',$id) ->update([ 'titre'=>$titre,
                                                                'lieu'=>$lieu,
                                                                'formateur'=>$formateur,
                                                                'prix'=>$prix,
                                                                'date_start'=>$date_start,
                                                                'date_end'=>$date_end
                                                            ]);
        return redirect('manifestationManager')->with('status', 'Training was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
