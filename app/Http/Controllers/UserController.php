<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class UserController extends Controller
{
    public function index(){
        $users = admin::all();

        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'mobileno' => 'required|regex:/^[0-9]{10}$/',
            'role' => 'required|string|max:255',
        ]);

        Admin::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password, 
            'mobileno' => $request->mobileno,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success','User creates successfully');
    }

    public function edit($id){
        $user = Admin::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = Admin::find($id);
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found.');
        }

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobileno' => 'required|regex:/^[0-9]{10}$/',
            'role' => 'required|string|max:255',
        ]);

        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'mobileno' => $request->mobileno,
            'role' => $request->role,
        ]);

        return redirect()->route('users')->with('success','User updates successfully');
    }
    
    public function toggleStatus($id)
        {
            $user = Admin::find($id); // Assuming Admin model is used for users

            if (!$user) {
                return redirect()->route('users.index')->with('error', 'User not found.');
            }

            // Toggle the status (assuming 'status' is a boolean field in the database)
            $user->status = !$user->status;
            $user->save();

            return redirect()->route('users.index')->with('success', 'User status updated successfully.');
        }

}
