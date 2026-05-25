<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validatedData['username'] === 'admin' && $validatedData['password'] === 'admin123') {
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công',
                'data'    => [
                    'token' => 'fake-jwt-token-for-admin'
                ]
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tên đăng nhập hoặc mật khẩu không đúng'
            ], 401);
        }
    }
}
