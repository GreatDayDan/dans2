@extends('layouts.app')
@section('content')
<div class="container">
  @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form name='f1' method="POST" action="process_post.php">
{{--        <fieldset>--}}
{{--            <legend>Select an Event </legend>--}}
            <div class="form-group">
                <label for="event_id">Choose an Event</label>
                <select name="event_id" id="event_id" class="form-control" required>
{{--                  @dd($jdevents);--}}
                    @foreach($jdevents as $event) {
                      <option value=$event>
                    @endforeach}
                      </option>
                </select>
            </div>
    </form>
  </div>
    @endsection
