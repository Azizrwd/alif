<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();

        return view('index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('create', compact('courses'));
    }

    public function store()
    {
        $validation = \request()->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);
          $student = Student::create($validation);

        $course = Course::find(\request()->courses);
        $student->course()->attach($course);

        return redirect('/students');
    }

    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    public function update(Student $student)
    {

        $student -> update(\request([
            'name', 'date_of_birth', 'phone', 'address', 'email'
        ]));

        return redirect('/students/' . $student->id);
    }

    public function edit(Student $student)
    {
        $courses = Course::all();

        return view('edit', [
            'student' => $student,
            'courses' => $courses
        ]);
    }

    public function removeCourse(Student $student)
    {
        $course = Course::find(\request()->courses);

        $student->course()->detach($course);

        return redirect('/students/' . $student->id);
    }

    public function addCourse(Student $student)
    {
        $course = Course::find(\request()->courses);

        $student->course()->attach($course);

        return redirect('/students/' . $student->id);
    }

    public function destroy(Student $student, Course $course)
    {
        $student->course()->detach();
        $student -> delete();

        return redirect('/students');
    }
}
