@extends('layouts.layout')

@section('content')
<h1>Данные студента </h1>
<hr>
<table class="table table-dark table-hover">
        <tr>
                <th>ФИО:</th>
                <td>{{ $student->name }}</td>
        </tr>
        <tr>
                <th>Дата рождения:</th>
                <td>{{ $student->date_of_birth }}</td>
        </tr>
        <tr>
                <th>Телефон:</th>
                <td>{{ $student->phone }}</td>
        </tr>
        <tr>
                <th>Адрес:</th>
                <td>{{ $student->address }}</td>
        </tr>
        <tr>
                <th>Email:</th>
                <td>{{ $student->email }}</td>
        </tr>
</table>

<h3>Курсы на которые записан студент:</h3>

<table class="table table-dark table-hover">

                @foreach($student->course as $stud)
                        <tr>
                                <td>{{ $stud->title }}</td>
                        </tr>
                @endforeach

</table>

<a href="/students/{{ $student->id }}/edit" class="btn btn-success btn-block">Изменить данные</a>
@endsection