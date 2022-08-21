<?php

namespace App\Http\Controllers;
use App\Models\ArticleSc;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\Brevet;
use App\Models\ChapitreOuv;
use App\Models\Conference;
use App\Models\OuvrageSc;
use Illuminate\Support\Facades\Validator;
class PublicationController extends Controller
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
    public function create()
    {
        //
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
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        $articles = ArticleSc::all();
        $brevets = Brevet::all();
        $ouvrages = OuvrageSc::all();
        $chapitres = ChapitreOuv::all();
        $conferences = Conference::all();
        return View('Fonctionnalites.postsManager',compact('articles','brevets','ouvrages','chapitres','conferences'));

    }
    function deletePublication(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Publication::find($request->id)->delete();
        return back()
            ->with('success', 'Publication deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //
    }
}
