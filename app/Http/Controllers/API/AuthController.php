<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['認証情報が誤っていたため、ログインに失敗しました'],
            ]);
        }

        return response()->json([
            'token' => $request->user()->createToken('api-token')->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        // ユーザーの現在のトークンを取得
        $token = $request->user()->currentAccessToken();

        // トークンを削除してログアウト
        $request->user()->tokens()->where('id', $token->id)->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
