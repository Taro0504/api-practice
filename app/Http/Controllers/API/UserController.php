<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
        $user->update($request->all());
        return new UserResource($user);
    }

    public function destroy(User $user): Response
    {
        $this->authorize('delete', $user);
        $user->delete();
        return response(null, 204);
    }
}
