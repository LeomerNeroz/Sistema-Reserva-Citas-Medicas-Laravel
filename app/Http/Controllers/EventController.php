<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'allDay' => 'boolean',
        ]);

       
        $event = Event::create([
            'title' => $validated['title'],
            'start' => $validated['start'],
            'end' => $validated['end'] ?? null,
            'all_day' => $validated['allDay'] ?? false,
        ]);

        
        return response()->json($event);
    }
}