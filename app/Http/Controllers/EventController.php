<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller{
$event = Event::latest()->paginate(5);

    public function index()
{

    return view('event.index',compact('event'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('event.create');
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
        'event' => 'required',
        'detail' => 'required',
    ]);

    Event::create($request->all());

    return redirect()->route('event.index')
        ->with('success','Event created successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
{
    return view('event.show',compact('event'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
{
    return view('event.edit',compact('event'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
{
    $request->validate([
        'event' => 'required',
        'detail' => 'required',
    ]);

    $event->update($request->all());

    return redirect()->route('event.index')
        ->with('success','event updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
{
    $event->delete();

    return redirect()->route('event.index')
        ->with('success','event deleted successfully');
}
}
