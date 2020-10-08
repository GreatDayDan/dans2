@foreach ($students as $key=> $student)
    <div>
        <a href="{{ URL::route('student.show', ['id' => $student->id]) }}">{{$student->name}}</a>
    </div>
@endforeach
