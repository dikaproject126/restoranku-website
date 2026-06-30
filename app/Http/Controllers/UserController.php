<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::whereHas('role', function($query){
            $query->where('role_name', '!=', 'customer');
        })->orderBy('fullname')->get();

        return view('admin.user.index', compact('users'));
    }

    
    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'phone' => 'required|string|max:255|unique:users,phone',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ], [
            'fullname.required' => 'The fullname is required.',
            'username.required' => 'The username is required.',
            'phone.required' => 'The phone is required.',
            'email.required' => 'The email is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'username.unique' => 'The username has already been taken.',
            'phone.unique' => 'The phone has already been taken.',
            'email.unique' => 'The email has already been taken.',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([

            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'phone' => 'required|string|max:15',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'password' => ['nullable', 'string', 'min:8', 'confirmed', function($attribute, $value, $fail) use ($user) {
                if(Hash::check($value, $user->password)){
                    $fail("Password baru tidak boleh sama dengan password lama.");
                }
            }],
            'role_id' => 'required|exists:roles,id',
        ], [
            'fullname.required' => 'The fullname is required.',
            'username.required' => 'The username is required.',
            'email.required' => 'The email is required.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(string $id)
    {

        $user = User::findOrFail($id);
        
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Role deleted successfully');
    }
}
