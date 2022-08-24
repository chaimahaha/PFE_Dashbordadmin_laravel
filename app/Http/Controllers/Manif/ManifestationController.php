<?php

namespace App\Http\Controllers\Manif;
use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\Manifestation;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ManifestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminDashboard.Forms.addConf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Manifestation::create([
            'titre' => $data['titre'],
            'lieu ' => $data['lieu'],
            'prix ' => $data['prix'],
            'date_start' => $data['date_start'],
            'date_end' => $data['date_end'],
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
            "titre" => "required",
            "lieu" => "required",
            "prix" => "required",
            "date_start" => "",
            "date_end" => "",
            "class"=>"in:a,b,c,internationale",

        ]);
        $conf= new Manifestation();
        $conf->titre = $request->titre;
        $conf->lieu = $request->lieu;
        $conf->prix = $request->prix;
        $conf->date_start = $request->date_start;
        $conf->date_end = $request->date_end;
        $conf->class = $request->input('class');
        $conf->save();
        return redirect('manifestationManager')->with('status', 'Conference was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manifestation  $manifestation
     * @return \Illuminate\Http\Response
     */
    public function show(Manifestation $manifestation)
    {
        $manifestations = Manifestation::all();
        $formations = Formation::all();
        return View('AdminDashboard.Fonctionnalites.manifestationManager',compact('manifestations','formations'));
    }
    function deleteManifestation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Manifestation::find($request->id)->delete();
        return back()
            ->with('success', 'Conference deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manifestation  $manifestation
     * @return \Illuminate\Http\Response
     */
    public function editManifestation($id)
    {
        $manifestations = Manifestation::find($id);
        return view('AdminDashboard.UpdatedForms.editManif',compact('manifestations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manifestation  $manifestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manifestation $manifestation)
    {
        $id=$request->id;
        $titre = $request->input('titre');
        $lieu = $request->input('lieu');
        $prix = $request->input('prix');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $class = $request->input('class');
        $isUpdateSuccess= Manifestation::where('id',$id) ->update([ 'titre'=>$titre,
                                                                'lieu'=>$lieu,
                                                                'prix'=>$prix,
                                                                'date_start'=>$date_start,
                                                                'date_end'=>$date_end,
                                                                'class'=>$class
                                                            ]);
        return redirect('manifestationManager')->with('status', 'Conference was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manifestation  $manifestation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manifestation $manifestation)
    {
        //
    }
}
