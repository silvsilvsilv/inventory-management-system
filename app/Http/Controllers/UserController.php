<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
    
        $users = $query->paginate(10)->appends(['search' => $request->search]);
    
        return view('admin.users', compact('users'));
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
            'role' => 'required|in:admin,manager', // Assuming roles are admin, manager
        ]);

        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withErrors(['password' => 'Passwords do not match.']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function updateUser(Request $request)
    {   
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'role' => 'required|in:admin,manager', // Assuming roles are admin, manager
        ]);

        $id = (int) $request->id;

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        // return response()->json([
        //     'message' => 'User updated successfully.',
        //     'user' => $user,
        // ]);
    }

    public function deleteUser(Request $request)
    {   
        $request->validate([
            'id' => 'required|integer|exists:users,id',
        ]);

        $id = (int) $request->id;

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
