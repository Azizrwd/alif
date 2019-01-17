@extends('layouts.layout')

@section('content')
    <h1>Изменить данные студента</h1>
    <hr>
    <form method="post" action="/students/{{$student->id}}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="ФИО" value="{{ $student->name }}" required>
        </div>
        <div class="form-group">
            <input type="date" name="date_of_birth" class="form-control" placeholder="Дата рождения" value="{{ $student->date_of_birth }}"  required>
        </div>
        <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Телефон" value="{{ $student->phone }}"  required>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Адрес" value="{{ $student->address }}"  required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $student->email }}"  required>
        </div>

        <button class="btn btn-block btn-dark">Изменить данные</button>
    </form>
    <div class="mt-5">
        <h2>Курсы посещаемые студентом</h2>
        <hr>
        <table class="table table-dark table-hover">

            @foreach($student->course as $stud)
                <tr>
                    <td>{{ $stud->title }}</td>
                </tr>
            @endforeach

        </table>
    </div>
    <div class="mt-5">
        <h2>Добавить курс</h2>
        <hr>
        <form action="/courses/students/{{$student->id}}" method="post">
            @csrf
            <div class="form-group">
                <select name="courses[]" id="courses" class="form-control" multiple>
                    <option value="" disabled selected>Выберите курсы</option>
                        @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                </select>
            </div>
            <button class="btn btn-block btn-success">+ Добавить курс</button>
        </form>
    </div>
    <div class="mt-5">
        <h2>Удалить курс</h2>
        <hr>
        <form action="/courses/students/{{$student->id}}" method="post">
            @method('DELETE')
            @csrf
            <div class="form-group">
                <select name="courses[]" id="courses" class="form-control" multiple>
                    <option value="" disabled selected>Выберите курсы</option>
                    @foreach($student->course as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-block btn-danger">Удалить курс</button>


        </form>
    </div>

@endsection