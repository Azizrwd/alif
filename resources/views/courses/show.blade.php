@extends('layouts.layout')

@section('content')
<h1>Курс {{ $course->title }}</h1>
<hr>

<h3>Студенты записаные на курс:</h3>

<table class="table table-dark table-hover">

                @foreach($course->student as $stud)
                        <tr>
                                <td><a href="/students/{{ $stud->id  }}">{{ $stud->name }}</a></td>
                        </tr>
                @endforeach

</table>
<div class="card mt-4">
<form method="post" action="/courses/{{$course->id}}/addstudent">
    @csrf
    <h5 class="card-header">Добавить студента на курс</h5>
    <div class="card-body">
        <div class="form-group">
            <select name="student" class="form-control" id="student">
                <option value="" disabled selected>Выберите студента</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">+ Добавить студента на курс</button>
    </div>
</form>
</div>

<div class="card mt-4">
<form method="post" action="/courses/{{$course->id}}/removestudent">
    @method('DELETE')
    @csrf
    <h5 class="card-header">Добавить студента на курс</h5>
    <div class="card-body">
        <div class="form-group">
            <select name="student" class="form-control" id="student">
                <option value="" disabled selected>Выберите студента</option>
                @foreach($course->student as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-danger">Удалить студента с курса</button>
    </div>
</form>
</div>

<div class="card mt-4">
        <form action="" method="post">
                @method('PATCH')
                @csrf
        <h5 class="card-header">Изменить название курса</h5>
        <div class="card-body">
                <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $course->title }}">
                </div>
                <button class="btn btn-dark">Изменить</button>
        </div>
        </form>
</div>

@endsection