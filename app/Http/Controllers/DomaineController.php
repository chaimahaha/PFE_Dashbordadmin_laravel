<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.addDom');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Domaine::create([
            'titre' => $data['titre'],
            'description' => $data['description'],
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
            "titre" => "required|min:5",
            "description" => "required",

        ]);
        $dom = new Domaine();
        $dom->titre = $request->titre;
        $dom->description = $request->description;
        $dom->save();
        return redirect('domainManager')->with('status', 'New domaine was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine $domaine)
    {
        $domaines = Domaine::all();

        return View('Fonctionnalites.domainManager',compact('domaines'));
    }
    function deleteDomaine(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Domaine::find($request->id)->delete();
        return back()
            ->with('success', 'Domaine deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function editDomain($id)
    {
        $domaines =Domaine::find($id);
        return view('UpdatedForms.editDom',compact('domaines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domaine $domaine)
    {
        $id=$request->id;
        $titre = $request->input('titre');
        $description = $request->input('description');
        $isUpdateSuccess= Domaine::where('id',$id) ->update(['titre'=>$titre,
                                                            'description'=>$description,
                                                            ]);
        return redirect('domainManager')->with('status', 'Domain was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domaine $domaine)
    {
        //
    }
}
