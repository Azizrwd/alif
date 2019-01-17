@extends('layouts.layout')

@section('content')
    <h1>Добавить студента</h1>
    <hr>
    <form method="post" action="/students">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="ФИО" required>
        </div>
        <div class="form-group">
            <input type="date" name="date_of_birth" class="form-control" placeholder="Дата рождения" required>
        </div>
        <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Телефон" required>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Адрес" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <select name="courses[]" id="courses" class="form-control" multiple>
                <option value="" disabled selected>Выберите курсы</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                 @endforeach
            </select>
        </div>

        <button class="btn btn-block btn-success">+ Добавить Студента</button>
    </form>
@endsection