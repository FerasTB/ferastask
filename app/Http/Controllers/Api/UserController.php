<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserIndexResource;
use App\Http\Requests\CreateUserApiRequest;
use App\Http\Requests\UpdateUserApiRequest;
use Illuminate\Http\Response;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return UserIndexResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserApiRequest $request)
    {
        $fields = $request->validated();
        $fields['password'] = Hash::make($request->password);
        $fields['role'] = UserRole::getValue($request->role);
        $user = User::create($fields);
        return new UserIndexResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserIndexResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserApiRequest $request, User $manager)
    {
        $fields = $request->validated();
        if ($request->password) {
            $fields['password'] = Hash::make($request->password);
        }
        $fields['role'] = UserRole::getValue($request->role);
        $manager->update($fields);
        return new UserIndexResource($manager);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $manager)
    {
        if ($manager->consultations->isEmpty()) {
            $manager->delete();
            return response('', Response::HTTP_NO_CONTENT);
        } else {
            return response('', Response::HTTP_BAD_REQUEST);
        }
    }
}
