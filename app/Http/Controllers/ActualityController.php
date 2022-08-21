<?php

namespace App\Http\Controllers;

use App\Models\Actuality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ActualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.addAct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Actuality::create([
            'titre' => $data['titre'],
            'description' => $data['description'],
            'image'=>$data['image'],
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
            'image' => 'required|file|mimes:jpeg,png',
            "description" => "required",
        ]);
    if($request->hasfile('image'))
    {
        $imagename = uniqid() . '_' . time(). '.' . $request->image->extension();
        $path = public_path() .'/actuality_image';
        $request->image->move($path, $imagename);
        $image = $imagename;
    }else{
    $image = '--';
    }
    $act = new Actuality();
    $act->titre = $request->titre;
    $act->image =$image;
    $act->description = $request->description;
    $act->save();
    return redirect('actualityManager')->with('status', 'actuality was added');




}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actuality  $actuality
     * @return \Illuminate\Http\Response
     */
    public function show(Actuality $actuality)
    {
        $actualities = Actuality::all();

        return View('Fonctionnalites.actualityManager',compact('actualities'));
    }
    function deleteActuality(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Actuality::find($request->id)->delete();
        return back()
            ->with('success', 'Actuality deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actuality  $actuality
     * @return \Illuminate\Http\Response
     */
    public function editActuality($id)
    {
        $actualities = Actuality::find($id);
        return view('UpdatedForms.editAct',compact('actualities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actuality  $actuality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actuality $actuality)
    {
        $id=$request->id;
        $titre = $request->input('titre');
        $description = $request->input('description');
       
        $isUpdateSuccess= Actuality::where('id',$id) ->update([ 'titre'=>$titre,
                                                                'description'=>$description,
                                                            ]);
        return redirect('actualityManager')->with('status', 'actuality was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actuality  $actuality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actuality $actuality)
    {
        //
    }
}
