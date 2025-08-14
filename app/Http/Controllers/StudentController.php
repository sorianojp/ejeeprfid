<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'rfid' => 'required|unique:students,rfid'
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }
}
