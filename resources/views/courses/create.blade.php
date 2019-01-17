@extends('layouts.layout')

@section('content')
    <h1>Добавить студента</h1>
    <hr>
    <form method="post" action="/courses">
        @csrf
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Название курса" required>
        </div>

        <button class="btn btn-block btn-success">+ Добавить Курс</button>
    </form>
@endsection