<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = \App\Models\Users::with('addresses')->get();
        return response()->json($users);
    }
    function show($id)
    {
        $user = \App\Models\Users::with('addresses')->find($id);
        if(!$user) {
            return response()->json(['message' => 'Khong tim thay'], 404);
        }
        return response()->json($user);
    }
    public function allAddresses()
    {
        $addresses = \App\Models\Address::with('user')->get();
        return response()->json($addresses);
    }

    public function getAllUsers()
    {
        // Lấy toàn bộ 20 user kèm địa chỉ
        $users = \App\Models\Users::with('addresses')->get();

        return response()->json([
            'success' => true,
            'message' => 'Danh sách người dùng',
            'data'    => $users
        ], 200);
    }

    public function getUserDetail($id)
    {
        $user = \App\Models\Users::with('addresses')->find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $user
        ], 200);
    }
}
