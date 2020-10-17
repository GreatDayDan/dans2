<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
//use function MongoDB\BSON\toJSON;

class EventController extends Controller
{
//$event = Event::latest()->paginate(5);
//    public $event;
//    public $data = 'this is a test';

    public function events1(){
        log::debug('gdd 012 events');
        $this->middleware('log')->only('index');
        return view('events');
    }
    public function index()
    {
        Log::debug('gdd 05.1 event index() EventController');
//    $events = event::all();
//        $events = event::all() -> SortBy('event')->pluck('event','id');
        $events = event::all()->SortBy('event');
//        dd($events);
//    Illuminate\Support\Collection {#1406 ▼
//    #items: array:9 [▼
//    1 => "event 1"
//    2 => "event 2"
//    4 => "test event 4"
//    5 => "test event 5"
//    6 => "test event 6"
//    7 => "test event 7"
//    8 => "test event 8"
//    9 => "test event 9"
//    3 => "testevent 3"
//  ]
//}
        $jevents = JSON_encode($events, false);
//        dd($jevents);
        $jdevents = JSON_decode($jevents);
//        $events = db::table('events');
//    dd($jdevents);
//        {#1406 ▼
//            +"0": {#1420 ▼
//            +"id": 1
//            +"user->id": 1
//            +"posts->id": 1
//            +"event": "event 1"
//            +"description": "descr 1"
//            +"created_at": null
//            +"updated_at": null
//  }
//            +"1": {#1418 ▶}
//            +"3": {#1405 ▶}
//            +"4": {#1433 ▶}
//            +"5": {#1434 ▶}
//            +"6": {#1435 ▶}
//            +"7": {#1436 ▶}
//            +"8": {#1437 ▶}
//            +"2": {#1438 ▶}
//}
//  var_dump($jdevents);
//        object(stdClass)#1406 (9) { ["0"]=> object(stdClass)#1420 (7) { ["id"]=> int(1) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(7) "event 1" ["description"]=> string(7) "descr 1" ["created_at"]=> NULL ["updated_at"]=> NULL } ["1"]=> object(stdClass)#1418 (7) { ["id"]=> int(2) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(7) "event 2" ["description"]=> string(7) "descr 2" ["created_at"]=> NULL ["updated_at"]=> NULL } ["3"]=> object(stdClass)#1405 (7) { ["id"]=> int(4) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(12) "test event 4" ["description"]=> string(12) "test descr 4" ["created_at"]=> NULL ["updated_at"]=> NULL } ["4"]=> object(stdClass)#1433 (7) { ["id"]=> int(5) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(12) "test event 5" ["description"]=> string(12) "test descr 5" ["created_at"]=> NULL ["updated_at"]=> NULL } ["5"]=> object(stdClass)#1434 (7) { ["id"]=> int(6) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(12) "test event 6" ["description"]=> string(12) "test descr 6" ["created_at"]=> NULL ["updated_at"]=> NULL } ["6"]=> object(stdClass)#1435 (7) { ["id"]=> int(7) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(12) "test event 7" ["description"]=> string(12) "test descr 7" ["created_at"]=> NULL ["updated_at"]=> NULL } ["7"]=> object(stdClass)#1436 (7) { ["id"]=> int(8) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(12) "test event 8" ["description"]=> string(12) "test descr 8" ["created_at"]=> NULL ["updated_at"]=> NULL } ["8"]=> object(stdClass)#1437 (7) { ["id"]=> int(9) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(12) "test event 9" ["description"]=> string(12) "test descr 9" ["created_at"]=> NULL ["updated_at"]=> NULL } ["2"]=> object(stdClass)#1438 (7) { ["id"]=> int(3) ["user->id"]=> int(1) ["posts->id"]=> int(1) ["event"]=> string(11) "testevent 3" ["description"]=> string(12) "test descr 3" ["created_at"]=> string(27) "2020-10-08T12:21:24.000000Z" ["updated_at"]=> NULL } }

        log::debug('gdd 05.2 found ' . $events->count() . ' events.');
//    log::debug(var_dump($jdevents));

//    var_dump($jevents);
//    var_dump($jevents);
//        return view('events', compact(['jdevents']));
        return view('events')->with[$jdevents];
//        return view('events',compact('events'));

//        return view('events')->with(['events' => $jdevents]);
//          return view('events',['events'=> $jdevents]);
//        return View('events')->with('events', $jdevents);


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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Log::info('gdd 07.1 event store() EventController' . $request->id);

        $this->validate(request(), [
            //put fields to be validated here
            'event' => 'required',
            'description' => 'required',
            'user->id' => 'required'
        ]);
        Log::info('gdd 07.2 event store() EventController' . $request->id);

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
     * @param \App\Event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
//{   alert('event show() EventController  .$event->id);');
        Log::info('gdd 08 event show() EventController' . $id);
        $post = \DB::table('events')->where('id', $id)->first();
//    if (! array_key_exists($post, 'posts')) {
//        abort(404, 'Oops, no such record');
//    }

        return view('post', ['post' => $post]);
//    $post = Post::where('post_id', $id)->first();

//    return View::make('posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(event $event)
    {
        Log::info('gdd 09 event edit() eventController' . $event->id);
        return view('event.edit', compact('event'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, event $event)
    {
        Log::info('gdd 10 event update() EventController  ' . $event->id);
        $request->validate([
            'event' => 'required',
            'description' => 'required'
        ]);
        $event->id = $request->get('id');
        $event->user->id = $request->get('user->id');
        $event->posts->id = $request->get('posts->id');
        $event->description = $request->get('description');
        $event->save();
        return redirect('/event')->with('success', 'event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(event $event)
    {
        Log::info('gdd 11 Event destroy EventController  ' . $event->id);
        $event->delete();

        return redirect()->route('event.index')
            ->with('success', 'event deleted successfully');
    }
    public function addEvent(Event $event){
        log::debug('gdd 12.1 addEvent, '. $event);
        $this->user_id = $event->user_id;
        $this->event = $event->event;
//        return $this->save();
        return redirect()->to('/front');
    }
}


