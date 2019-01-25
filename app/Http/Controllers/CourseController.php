<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \request()->validate([
            'title' => 'required'
        ]);

        Course::create($validation);
        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $students = Student::all();




        return view('courses.show', [
            'course' => $course,
            'students' => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $course->update(['title' => $request->title]);
        return redirect('/courses/' . $course->id);
    }

    public function addStudent(Course $course)
    {
        $student = Student::find(\request()->student);
        $course->student()->attach($student);

        return redirect('/courses/' . $course->id);
    }

    public function removeStudent(Course $course)
    {

        $student = Student::find(\request()->student);
        $course->student()->detach($student);

        return redirect('/courses/' . $course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->student()->detach();

        $course -> delete();
        return redirect('/courses');
    }
}
