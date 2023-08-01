<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class PostSanctumTokenController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('token-name', $this->generateUserAbilities($user));
            return response()->json(['api_token' => $token->plainTextToken,
                'expires_at' => $token->accessToken->token_expires_at], 200);
        }

        return response()->json(['api_token' => null], 401);
    }

    private function generateUserAbilities(User $user)
    {
        $userRole = $user->userRole;
        return ($userRole && $userRole->isAdmin()) ? ['*'] : ['read', 'write'];
    }
}
