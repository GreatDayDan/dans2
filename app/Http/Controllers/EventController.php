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
        Log::debug('gdd 05.1 event index() EventController');
//    $events = event::all();
        $events = event::all();  //orderBy('event')->pluck('event', 'id', 'description');
        $jevents = JSON_encode($events, false);
        $jdevents = JSON_decode($jevents);
//        $events = db::table('events');
//    dd($events);
        log::debug('gdd 05.2 found ' . $events->count() . ' events.');
//    log::debug(var_dump($jdevents));
//    dd($jevents);
//    var_dump($jevents);
        return view('events', compact(['jdevents']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
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
    Log::info('gdd 07.1 event store() EventController' .$request->id);

    $this->validate(request(),[
        //put fields to be validated here
        'event'=>'required',
        'description'=>'required',
        'user->id'=>'required'
    ]);
    Log::info('gdd 07.2 event store() EventController' .$request->id);

    $event = new event(array(
        'user->id' => $request->get('user->id'),
        'posts-id' => $request->get('posts-id'),
        'event' => $request->get('event'),
        'description' => $request->get('description')));
        $event->save();
    Log::info('gdd 07.3 event store() EventController' . $event);
//        return view ('events');
//    return redirect('/events')->with('success', 'event saved!');
        return back()->withSuccess('Event added successfullyz!');

//        return redirect()->route('/events')
//          ->with('success','Event created successfully.');
} //store

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
// https://laracasts.com/discuss/channels/laravel/laravel-save-input-values-for-later
    public function step1(Request $request)
    {
        log::debug('gdd 11.1 '. $request);
        if($request->isMethod('post')) {
            // do some error checking via $this->validate();
            \Session::put('step1', $request->all());
            return redirect()->to('/step2');
        }
        return view('step1');
    }

    public function step2(Request $request)
    {
        log::debug('gdd 11.2 '. $request);
        if($request->isMethod('post')) {
            // do some error checking via $this->validate();
            \Session::put('step1', $request->all());
            return redirect()->to('/step3');
        }
        return view('step2');
    }

    public function step3(Request $request)
    {
        log::debug('gdd 11.3 '. $request);
        if($request->isMethod('post')) {
            // this is the end step
            // do some error checking via $this->validate();
            // Merge all data from step1 - step3 in 1 array
            $data = \Session::pull('step1', []);
            $data = array_merge($data, \Session::pull('step1', []));
            $data = array_merge($data, $request->all());
            // perhaps validate the complete dataset as well via $this->validate();

            dd($data);
        }
        return view('step3');
    }
    public function addEvent($eventData){
        log::debug('gdd 12.1 addEvent, '. $eventData);
        $this->user_id = $eventData->user_id;
        $this->event = $eventData->event;
//        return $this->save();
        return redirect()->to('/events');
    }
}


