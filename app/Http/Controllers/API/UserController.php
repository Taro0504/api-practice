<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    // ログインしていないとアクセスできないようにする
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['login']);
    }

    public function index(): JsonResponse
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return response()->json($users);
    }

    public function show(User $user): UserResource
    {
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    public function store(Request $request): UserResource
    {
        $this->authorize('create', User::class);
        $user = User::create($request->all());
        return new UserResource($user);
    }

    public function update(Request $request, User $user): UserResource
    {
        $this->authorize('update', $user);
        $user->update(
            $request->user_name,
            $request->name_kana,
            $request->employee_position,
            $request->email,
            $request->password
        );
        return new UserResource($user);
    }

    public function destroy(User $user): Response
    {
        $this->authorize('delete', $user);
        $user->delete();
        return response(null, 204);
    }
}
