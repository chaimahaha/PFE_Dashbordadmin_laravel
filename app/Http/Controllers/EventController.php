<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminDashboard.Forms.addEvent');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Event::create([
            'titre' => $data['titre'],
            'lieu'=>$data['lieu'],
            'description' => $data['description'],
            'prix' => $data['prix'],
            'image' => $data['image'],
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
            "titre" => "required|min:5",
            'image' => 'file|mimes:jpeg,png|max:5000',
            "lieu" => "required",
            "description" => "required",
            "prix" => "required",
            "date_start" => "",
            "date_end" => "",

        ]);
        if($request->hasfile('image'))
            {
                $imagename = uniqid() . '_' . time(). '.' . $request->image->extension();
                $path = public_path() .'/event_image';
                $request->image->move($path, $imagename);
                $image = $imagename;
            }else{
            $image = '--';
            }
        $event = new Event();
        //$image = "image".uniqid().'.'.$request->file('image')->extension();
        //$request->file('image')->storeAs("public/event_image",$image);
        $event->titre = $request->titre;
        $event->image =$image;
        $event->lieu = $request->lieu;
        $event->description = $request->description;
        $event->prix = $request->prix;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->save();
        return redirect('eventManager')->with('status', 'event was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $events = Event::all();

        return View('AdminDashboard.Fonctionnalites.eventManager',compact('events'));
        //compact t3adi les données lel vue

    }
    function deleteEvent(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        Event::find($request->id)->delete();
        return back()
            ->with('success', 'Event deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function editEvent($id)
    {
        $events = Event::find($id);
        return view('AdminDashboard.UpdatedForms.editEvent',compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $id=$request->id;
        $titre = $request->input('titre');
        $lieu= $request->input('lieu');
        $description = $request->input('description');
        $prix = $request->input('prix');
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $isUpdateSuccess= Event::where('id',$id) ->update([ 'titre'=>$titre,
                                                            'lieu'=>$lieu,
                                                            'description'=>$description,
                                                            'prix'=>$prix,
                                                            'date_start'=>$date_start,
                                                            'date_end'=>$date_end
                                                            
                                                            ]);
        return redirect('eventManager')->with('status', 'Event was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
