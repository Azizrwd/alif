<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return redirect('/students');
});

/* Students */

Route::get('/students', 'StudentController@index');

Route::get('/students/create', 'StudentController@create');

Route::post('/students', 'StudentController@store');

Route::get('/students/{student}/edit', 'StudentController@edit');

Route::patch('/students/{student}', 'StudentController@update');

Route::delete('/students/{student}', 'StudentController@destroy');


Route::get('students/{student}', 'StudentController@show');

Route::delete('courses/students/{student}', 'StudentController@removeCourse');

Route::post('courses/students/{student}', 'StudentController@addCourse');

/*Courses*/

Route::resource('courses', 'CourseController');

Route::post('/courses/{course}/addstudent', 'CourseController@addStudent');

Route::delete('/courses/{course}/removestudent', 'CourseController@removeStudent');

/* Auth */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
