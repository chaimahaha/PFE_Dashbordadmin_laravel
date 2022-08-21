<?php

namespace App\Http\Controllers;

use App\Models\AuteurProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuteurProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuteurProjet  $auteurProjet
     * @return \Illuminate\Http\Response
     */
    public function show(AuteurProjet $auteurProjet)
    {
        $auteurs =AuteurProjet::all();
        return View('Fonctionnalites.postsManager',compact('auteurs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuteurProjet  $auteurProjet
     * @return \Illuminate\Http\Response
     */
    public function edit(AuteurProjet $auteurProjet)
    {
        //
    }
    function deleteAuteur(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        AuteurProjet::find($request->id)->delete();
        return back()
            ->with('success', 'Auteur deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuteurProjet  $auteurProjet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuteurProjet $auteurProjet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuteurProjet  $auteurProjet
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuteurProjet $auteurProjet)
    {
        //
    }
}
