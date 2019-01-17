@extends('layouts.layout')

@section('content')
    <h1>Студенты</h1>
    <hr>
    <div class="students_block">
        @foreach($students as $student)
            <div class="students">

                    <a href="/students/{{ $student->id }}">{{$student->name}}</a>

                <div>
                    <a href="/students/{{ $student->id }}/edit" class="edit-link">Изменить</a>
                    <a href="#" class="delete-link" onclick="event.preventDefault();document.getElementById('delete_student{{$student->id}}').submit();">Удалить</a>
                    <form action="/students/{{ $student->id }}" method="post" id="delete_student{{$student->id}}">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>

            </div>
        @endforeach

    </div>
    <a href="/students/create" class="btn btn-block btn-success">+ Добавить студента</a>
@endsection