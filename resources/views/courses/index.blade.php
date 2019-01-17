@extends('layouts.layout')

@section('content')
    <h1>Курсы</h1>
    <hr>
    <div class="students_block">
        @foreach($courses as $course)
            <div class="students">

                    <a href="/courses/{{ $course->id }}">{{$course->title}}</a>

                <div>
                    <a href="/courses/{{ $course->id }}" class="edit-link">Изменить</a>
                    <a href="#" class="delete-link" onclick="event.preventDefault();document.getElementById('delete_student{{$course->id}}').submit();">Удалить</a>
                    <form action="/courses/{{ $course->id }}" method="post" id="delete_student{{$course->id}}">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>

            </div>
        @endforeach

    </div>
    <a href="/courses/create" class="btn btn-block btn-success">+ Добавить курс</a>
@endsection