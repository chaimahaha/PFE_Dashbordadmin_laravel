<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Forms.addEvent');

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
            "image" => "required|file|mimes:jpeg,png|max:5000",
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
        return redirect('add_event')->with('status', 'event was created');
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

        return View('Fonctionnalites.eventManager',compact('events'));
        //compact t3adi les données lel vue

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
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
        //
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
