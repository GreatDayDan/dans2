@extends('layouts.app')
@section('content')
<div class="container">
  @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @eventId = '-1';
    <form name='f1' method="POST" action="process_post.php">
        <fieldset>
            <legend>Select an Event </legend>
{{--            <div class="form-group">--}}
{{--                <label for="event_id">Choose an Event</label>--}}
                <select name="event_id" id="event_id" class="form-control" required onChange="changeDescription(1)">
                    @foreach($jdevents as $event)
                        <option name="pid" value="{{$event->id}}" id="event">{{$event->event}}</option>
                    @endforeach
                </select>
                <p>
                    <input type="text" id="hideme">
                    <input type="text" id="ename" name="EVENT" width="600" value =""
                           placeholder="Select an existing event from the list or enter a new event here.">
                </p>
                <p>
                    <label id="label4" for="DESCRIPTION">Description</label>
                    <textarea id ="descr" rows="5" cols="50" form="f1" name="DESCRIPTION" placeholder="Describe the event" id="DESCRIPTION"></textarea>
                </p>

                <input type='submit' id='submit_id' name='submit_id'</input>

        </fieldset>
</div>
    </form>
  </div>
    @endsection
