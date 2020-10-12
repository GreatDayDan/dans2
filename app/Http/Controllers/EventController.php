<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
//use function MongoDB\BSON\toJSON;

class EventController extends Controller{
//$event = Event::latest()->paginate(5);
//    public $event;
//    public $data = 'this is a test';

    public function index()
{
    Log::debug('gdd 05 event index() EventController');
//    $events = event::all();
    $events = event::all();  //orderBy('event')->pluck('event', 'id', 'description');
    $jevents = JSON_encode($events, false);
    $jdevents = JSON_decode($jevents);
//        $events = db::table('events');
//    dd($events);
    log::debug('gdd 5.1 found ' . $events->count() . ' events.');
//    log::debug(var_dump($jdevents));
//    dd($jevents);
//    var_dump($jevents);
    return view('events', compact(['jdevents']));


//    $events = \App\Event::all();

//    return view('viewevents', ['allEvents' => $events]);
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
    Log::info('gdd 06 event.create EventController');
    return view('event.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    Log::info('gdd 07 event store() EventController' .$request->id);
    $this->validate(request(),[
        //put fields to be validated here
        'event'=>'required',
        'description'=>'required',
        'user->id'=>'required'
    ]);
//
//    $user= new User();
//    $user->username= $request['username'];
//    $user->company= $request['company'];
//    // add other fields
//    $user->save();
//
//    return redirect('/');


//    $request->validate([
//        'event'=>'required',
//        'description'=>'required',
//        'user->id'=>'required'
//    ]);
    $event = new event([
        'user->id' => $request->get('user->id'),
        'posts-id' => $request->get('posts-id'),
        'event' => $request->get('event'),
        'description' => $request->get('description')
    ]);
//    $event->save();7
//    return redirect('/events')->with('success', 'Event saved!');
//

//    $request->validate([
//        'event' => 'required',
//        'description' => 'required'
//    ]);
//    return redirect('/events');
//        Event::create($request->all());

    return redirect()->route('events.index')
        ->with('success','Event created successfully.');
} //save

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id){
//{   alert('event show() EventController  .$event->id);');
    Log::info('gdd 08 event show() EventController'  .$id);
    $post=\DB::table('events')->where('id',$id)->first();
//    if (! array_key_exists($post, 'posts')) {
//        abort(404, 'Oops, no such record');
//    }

    return view('post',['post'=>$post]);
//    $post = Post::where('post_id', $id)->first();

//    return View::make('posts.show', compact('post'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
{
    Log::info('gdd 09 event edit() eventController'  .$event->id);
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
        Log::info('gdd 10 event update() EventController  '  . $event->id);
        $request->validate([
            'event'=>'required',
            'description'=>'required'
        ]);
        $event->id =  $request->get('id');
        $event->user->id = $request->get('user->id');
        $event->posts->id = $request->get('posts->id');
        $event->description = $request->get('description');
        $event->save();
        return redirect('/event')->with('success', 'event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
{
    Log::info('gdd 11 Event destroy EventController  '  .$event->id);
    $event->delete();

    return redirect()->route('event.index')
        ->with('success','event deleted successfully');
}
}
