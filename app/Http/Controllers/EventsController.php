<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index ()
    {
   $events = Event::all();
        return view('events.index',['events'=>$events]);
    }

    public function create ()
    {
        return view('events.create');
    }
    
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', ['event' => $event]);
    }

    public function store(Request $request)
    {
        // Podstawowa walidacja formularza:
        $this->validate($request, [
        'name' => 'required',
        'date' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'info' => 'required|min:5|max:255',
        ],
        [
            'name.required'=>'Pole nazwa wydarzenia jest wymagane',
            'date.required'=>'Pole data wydarzenia jest wymagane',
            'address.required'=>'Pole adres jest wymagane',
            'phone.required'=>'Pole numer telefonu jest wymagane',
            'info.required'=>'Pole dodatkowe informacje jest wymagane',
        ]);
   
         $event = new Event();
         $event->user_id=\Auth::user()->id;
         $event->name = $request->name;
        $event->date = $request->date;
        $event->address = $request->address;
        $event->phone = $request->phone;
        $event->info = $request->info;
        
       /* $request->input('name');
        $request->input('date');
        $request->input('address');
        $request->input('phone');
        $request->input('info');
*/
        $event->save();

        return redirect()->route('events.index')->with('message','Wydarzenie dodane poprawnie');

    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'info' => 'required|min:3|max:255',
        ],
        [
            'name.required'=>'Pole nazwa wydarzenia jest wymagane',
            'date.required'=>'Pole data wydarzenia jest wymagane',
            'address.required'=>'Pole adres jest wymagane',
            'phone.required'=>'Pole numer telefonu jest wymagane',
            'info.required'=>'Pole dodatkowe informacje jest wymagane',
            'info.required.min:3'=>'Pole dodatkowe informacje  mmusi miec więcej niż 2 znaki'
        ]);
         $event = Event::find($id);
         $event->name = $request->name;
        $event->date = $request->date;
        $event->address = $request->address;
        $event->phone = $request->phone;
        $event->info = $request->info;
        
        $event->save();

        return redirect()->route('events.index')->with('message','Wydarzenie zmienione poprawnie');
 
    }

    public function delete($id)
    {
        Event::destroy($id);
        return redirect()->route('events.index')->with('message','Wydarzenie usunięte poprawnie');

    }
}
