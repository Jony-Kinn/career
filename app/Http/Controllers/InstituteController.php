<?php

namespace App\Http\Controllers;

use App\Models\Institute; // Import Institute model
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    // Display a listing of the institutes
    public function index()
    {
        $institutes = Institute::all(); // Fetch all institutes
        return view('institutes.index', compact('institutes')); // Return a view with institutes
    }

    // Show the form for creating a new institute
    public function create()
    {
        return view('institutes.create'); // Return the view for creating an institute
    }

    // Store a newly created institute
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:institutes',
        ]);

        Institute::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
        ]);

        return redirect()->route('institutes.index')->with('success', 'Institute created successfully.');
    }

    // Show a specific institute
    public function show($id)
    {
        $institute = Institute::findOrFail($id); // Find institute or fail
        return view('institutes.show', compact('institute')); // Return the institute's view
    }

    // Show the form for editing a specific institute
    public function edit($id)
    {
        $institute = Institute::findOrFail($id); // Find institute or fail
        return view('institutes.edit', compact('institute')); // Return the edit view
    }

    // Update a specific institute
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:institutes,email,' . $id,
        ]);

        $institute = Institute::findOrFail($id);
        $institute->name = $request->name;
        $institute->address = $request->address;
        $institute->contact_number = $request->contact_number;
        $institute->email = $request->email;

        $institute->save();

        return redirect()->route('institutes.index')->with('success', 'Institute updated successfully.');
    }

    // Delete a specific institute
    public function destroy($id)
    {
        $institute = Institute::findOrFail($id);
        $institute->delete();

        return redirect()->route('institutes.index')->with('success', 'Institute deleted successfully.');
    }
}

