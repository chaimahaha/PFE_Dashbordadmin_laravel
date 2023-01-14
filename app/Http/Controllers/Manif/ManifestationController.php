<?php

namespace App\Http\Controllers\Manif;
use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\Manifestation;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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
    public function show(Request $request)
    {
        $data['q']= $request->query('q');
        $data['class']=$request->query('class');
        $query = DB::table('manifestations')
        ->where (function ($query) use($data){
            $query->where('titre', 'like', '%' .$data['q'].'%');
            $query->orWhere('lieu', 'like', '%' .$data['q'].'%');
            $query->orWhere('prix', 'like', '%' .$data['q'].'%');
        });
        $query2 = DB::table('formations')
        ->where (function ($query) use($data){
            $query->where('titre', 'like', '%' .$data['q'].'%');
            $query->orWhere('lieu', 'like', '%' .$data['q'].'%');
            $query->orWhere('prix', 'like', '%' .$data['q'].'%');
            $query->orWhere('formateur', 'like', '%' .$data['q'].'%');
         
        });
       if($data['class']){
            $query->where('manifestations.class',$data['class']);
        }
        $data['manifestations'] = $query->paginate(9);
        $data['formations'] = $query2->paginate(9);
        return View('AdminDashboard.Fonctionnalites.manifestationManager',$data);
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
