<?php

namespace App\Http\Controllers;

use App\Models\Student; // Import the Student model
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of the students
    public function index()
    {
        $students = Student::all(); // Fetch all students
        return view('students.index', compact('students')); // Return a view with students
    }

    // Show the form for creating a new student
    public function create()
    {
        return view('students.create'); // Return the view for creating a student
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'age' => 'required|integer|min:1',
            'address' => 'nullable|string|max:255',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'address' => $request->address,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    // Show a specific student
    public function show($id)
    {
        $student = Student::findOrFail($id); // Find student or fail
        return view('students.show', compact('student')); // Return the student's view
    }

    // Show the form for editing a specific student
    public function edit($id)
    {
        $student = Student::findOrFail($id); // Find student or fail
        return view('students.edit', compact('student')); // Return the edit view
    }

    // Update a specific student
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $id,
            'age' => 'required|integer|min:1',
            'address' => 'nullable|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->address = $request->address;

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Delete a specific student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
