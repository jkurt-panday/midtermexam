<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::get();
        $editStudent = null;

        // if the url has ?edit=5, find that student
        if ($request->has('edit'))
            $editStudent = Student::find($request->edit);

        return view('students.index', compact('students', 'editStudent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_num' => ['required', 'max:9', 'unique:students,student_num'],
            'fname' => ['required', 'string'],
            'mname' => ['nullable', 'string'],
            'lname' => ['required', 'string'],
            'sname' => ['nullable', 'string'],
            'birthdate' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'string', 'in:Male,Female'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // return view('students.index', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_num' => ['required', 'max:9', Rule::unique('students')->ignore($student->id)],
            'fname' => ['required', 'string'],
            'mname' => ['nullable', 'string'],
            'lname' => ['required', 'string'],
            'sname' => ['nullable', 'string'],
            'birthdate' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'string', 'in:Male,Female'],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted');
    }
}
