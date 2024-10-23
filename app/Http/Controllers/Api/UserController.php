<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Fetch all users
    public function index(){
        $users = Admin::all();
        return response()->json([
            'success' => true,
            'users' => $users
        ], 200); // Return users as JSON
    }

    // Store a new user
    public function store(Request $request){
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email', // Assuming 'admins' table
            'password' => 'required|min:6',
            'mobileno' => 'required|regex:/^[0-9]{10}$/',
            'role' => 'required|string|max:255',
        ]);

        // Save the user with hashed password
        $user = Admin::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'mobileno' => $request->mobileno,
            'role' => $request->role,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'user' => $user
        ], 201); // 201 Created
    }

    // Fetch a single user by ID
    public function show($id) {
        $user = Admin::find($id);
        
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404); // 404 Not Found
        }
    }

    // Update a user by ID
    public function update(Request $request, $id) {
        $user = Admin::find($id);

        if ($user) {
            $validated = $request->validate([
                'fname' => 'sometimes|required|string|max:255',
                'lname' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:admins,email,' . $id,
                'mobileno' => 'sometimes|required|regex:/^[0-9]{10}$/',
                'role' => 'sometimes|required|string|max:255',
            ]);

            $user->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'user' => $user
            ], 200); // 200 OK
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404); // 404 Not Found
        }
    }

}
