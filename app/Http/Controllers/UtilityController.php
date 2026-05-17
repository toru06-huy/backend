<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utility;

class UtilityController extends Controller
{
    public function getAllUtilities()
    {
        $utilities = Utility::with('room')->get();

        return response()->json([
            'success' => true,
            'message' => 'Danh sách tiện ích',
            'data'    => $utilities
        ], 200);
    }

    public function getUtilityDetail($id)
    {
        $utility = Utility::with('room')->find($id);

        if (!$utility) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy tiện ích'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $utility
        ], 200);
    }
}
