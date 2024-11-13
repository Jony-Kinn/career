<?php

namespace App\Http\Controllers;

use App\Models\User; // Import User model
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show a list of all users
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.users.index', compact('users')); // Return a view with users
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create'); // Return the view for creating a user
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // Show a specific user
    public function show($id)
    {
        $user = User::findOrFail($id); // Find user or fail
        return view('admin.users.show', compact('user')); // Return the user's view
    }

    // Show the form for editing a specific user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user or fail
        return view('admin.users.edit', compact('user')); // Return the edit view
    }

    // Update a specific user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Delete a specific user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}

