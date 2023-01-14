<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminDashboard.Forms.addDom');
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
    public function show(Request $request)
    {
        $data['q']= $request->query('q');
        $query = DB::table('domaines')->where (function ($query) use($data){
            $query->where('titre', 'like', '%' .$data['q'].'%');
            $query->orWhere('description', 'like', '%' .$data['q'].'%');
           
        });
      
        $data['domaines'] = $query->paginate(9);
      

        return View('AdminDashboard.Fonctionnalites.domainManager',$data);
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
        return view('AdminDashboard.UpdatedForms.editDom',compact('domaines'));
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
