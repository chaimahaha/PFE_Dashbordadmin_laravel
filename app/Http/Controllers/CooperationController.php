<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnSelf;
use Illuminate\Support\Facades\Auth;
class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if (Auth::user()-> is_admin ) {
        return view ('AdminDashboard.Forms.addCoop');
    } else return view ('MembreDashboard.Forms.addCoop');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Cooperation::create([
            'type'=>$data['type'],
            'intervenantnat'=>$data['intervenantnat'],
            'intervenantin'=>$data['intervenantin'],
            'sujet'=>$data['sujet'],
            'institution'=>$data['institution'],
            'file'=>$data['file'],
            'date_start'=>$data['date_start'],
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
        $request -> validate([
            "type" => "in:nationale,internationale",
            "intervenantnat" => "required",
            "intervenantin"=>"required",
            "sujet"=>"required",
            "institution"=>"required",
            "file" => "required|mimes:pdf,doc,docx|max:10000",
            "date_start"=>"",
            "date_end" => "",

        ]);
        if($request->hasfile('file'))
            {
                $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
                $path = public_path() .'/cooperation_file';
                $request->file->move($path, $filename);
                $file = $filename;
            }else{
            $file = '--';
            }
            $cooperation= new Cooperation();
            $cooperation->type = $request->input('type');
            $cooperation-> intervenantnat = $request->intervenantnat;
            $cooperation-> intervenantin = $request->intervenantin;
            $cooperation-> sujet = $request-> sujet;
            $cooperation-> institution = $request-> institution;
            $cooperation-> file = $file;
            $cooperation-> date_start= $request-> date_start;
            $cooperation->date_end = $request->date_end;
            $cooperation->save();
            return redirect('cooperationManager')->with('status', 'cooperation was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperation  $cooperation
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperation $cooperation)
    {
        $cooperations = Cooperation::all();
        if (Auth::user()-> is_admin ) {
        return View('AdminDashboard.Fonctionnalites.cooperationManager',compact('cooperations'));
    } else return View('MembreDashboard.Fonctionnalites.cooperationManager',compact('cooperations'));
}
    function deleteCooperation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Cooperation::find($request->id)->delete();
        return back()
            ->with('success', 'Cooperation deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperation  $cooperation
     * @return \Illuminate\Http\Response
     */
    public function editCooperation($id)
    {
        $cooperations =Cooperation::find($id);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editCoop',compact('cooperations'));}
        else return view('MembreDashboard.UpdatedForms.editCoop',compact('cooperations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cooperation  $cooperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cooperation $cooperation)
    {
        $id=$request->id;
        $type = $request->input('type');
        $intervenantnat = $request->input('intervenantnat');
        $intervenantin = $request->input('intervenantin');
        $sujet =$request->input('sujet');
        $institution =$request->input('institution');
        $date_start =$request->input('date_start');
        $date_end =$request->input('date_end');
        $isUpdateSuccess= Cooperation::where('id',$id) ->update([   'type'=>$type,
                                                                    'intervenantnat'=>$intervenantnat,
                                                                    'sujet'=>$sujet,
                                                                    'institution'=>$institution,
                                                                    'date_start'=>$date_start,
                                                                    'date_end'=>$date_end
                                                            ]);
        return redirect('cooperationManager')->with('status', 'Cooperation was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperation  $cooperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperation $cooperation)
    {
        //
    }
}
