<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function dashboard() {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create() {
        return view('admin.events.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Event::create($request->all());
        return redirect()->route('admin.events.dashboard')->with('success','Event created successfully!');
    }

    public function edit(Event $event){
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $event->update($request->all());
        return redirect()->route('admin.events.dashboard')->with('success','Event updated successfully!');
    }

    public function destroy(Event $event){
        $event->delete();
        return redirect()->route('admin.events.dashboard')->with('success','Event removed successfully!');
    }
}