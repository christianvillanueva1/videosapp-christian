<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Tests\Feature\Users\UserManageTest;
use Tests\Unit\UserTest;

class UsersManageController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.manage.index', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);


        add_personal_team($user, $user->name . ' Team');


        return redirect()->route('users.manage.index')->with('success', 'Usuari creat correctament.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.manage.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,name',

        ]);

        $user->syncRoles([$request->role]);


        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.manage.index')->with('success', 'Usuari actualitzat correctament.');
    }

    public function testedBy()
    {
        return UserManageTest::class;
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users.manage.index')->with('success', 'Usuari eliminat correctament.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        $user->delete();
        return redirect()->route('users.manage.index')->with('success', 'Usuari eliminat permanentment.');
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.manage.create', compact('roles'));
    }
}
