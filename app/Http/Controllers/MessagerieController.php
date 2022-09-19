<?php

namespace App\Http\Controllers;

use App\Models\Messagerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class MessagerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view ('MembreDashboard.Fonctionnalites.envoieMessage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {   $id_user=Auth::id();
        return Messagerie::create([
            'id_user'=>$data['id_user'],
            'msg' => $data['msg'],
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
            "msg" => "required",
        ]);
        $message =new Messagerie();
        $message->id_user=Auth::user()->id;
        $message->msg = $request->msg;
        $message->save();
        return redirect('envoiemessage')->with('status', 'le message a été envoyé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messagerie  $messagerie
     * @return \Illuminate\Http\Response
     */
    public function show(Messagerie $messagerie)
    {
        if (Auth::user()->is_admin){
        $messages =Messagerie ::all();
         return view ('AdminDashboard.Fonctionnalites.messagerie',compact('messages'));
        }else {
        $messages=Messagerie::where('id_user', Auth::user()->id)->get();
        return view ('MembreDashboard.Fonctionnalites.envoieMessage',compact('messages'));
    }}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messagerie  $messagerie
     * @return \Illuminate\Http\Response
     */
    public function edit(Messagerie $messagerie)
    {
        //
    }
    function deleteMsg(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Messagerie::find($request->id)->delete();
        return back()
            ->with('success', 'Message deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messagerie  $messagerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messagerie $messagerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messagerie  $messagerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messagerie $messagerie)
    {
        //
    }
}
