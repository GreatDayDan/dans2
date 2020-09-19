<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller{
//$event = Event::latest()->paginate(5);

    public function index()
{
    Log::info('gdd 05 event index()');

    $events = \App\Event::all();

    return view('viewevents', ['allEvents' => $events]);
//    return view('event.index',compact('event'))
//        ->with('i', (request()->input('page', 1) - 1) * 5);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    Log::info('gdd 06 event.create');
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
    Log::info('gdd 07 event store() ' .$request->id);
    $request->validate([
        'event' => 'required',
        'description' => 'required'
    ]);
    \App\Event::create([
        'id' => $request->get('id'),
        'user->id' => $request->get('user->id'),
        'posts->id' => $request->get('posts->id'),
        'event' => $request->get('event'),
        'description' => $request->get('description')
    ]);
//    return redirect('/events');
//        Event::create($request->all());

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
    Log::info('gdd 08 event show()'  .$event->id);
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
    Log::info('gdd 09 event edit()' .$event->id);
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
    Log::info('gdd 10 event update()'  . $event->id);
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
    Log::info('gdd 11 event destroy()'  .$event->id);
    $event->delete();

    return redirect()->route('event.index')
        ->with('success','event deleted successfully');
}
}
