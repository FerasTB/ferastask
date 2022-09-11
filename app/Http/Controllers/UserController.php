<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Request;
use CreateUsersTable;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function edit(User $user)
    {
        $userRole = UserRole::asArray();
        return view('users.edit', [
            'user' => $user,
            'userRole' => $userRole,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $fields = $request->validated();
        $fields['password'] = Hash::make($request->password);
        $user->update($fields);
        return redirect('/user')->with('message', 'updated user');
    }

    public function create()
    {
        $userRole = UserRole::asArray();
        return view('users.create', [
            'userRole' => $userRole,
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $fields = $request->validated();
        $fields['password'] = Hash::make($request->password);
        $user = User::create($fields);
        return redirect('/user')->with('message', 'created user');
    }
}
