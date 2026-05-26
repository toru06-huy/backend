<?php

namespace App\Http\Controllers;

use App\Models\Room;
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
        $utility = Utility::with('room','invoices')->find($id);

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

    public function createUtility(Request $request)
    {
        $validatedData = $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'month' => 'required|integer|min:1|max:12',
            'electric_old' => 'required|integer|min:0',
            'electric_new' => 'required|integer|min:0',
            'water_old' => 'required|integer|min:0',
            'water_new' => 'required|integer|min:0',
        ]);

        if ($validatedData['electric_new'] <= $validatedData['electric_old']) {
            return response()->json([
                'success' => false,
                'message' => 'Chỉ số điện mới phải lớn hơn hoặc bằng chỉ số cũ'
            ], 401);
        }

        if ($validatedData['water_new'] <= $validatedData['water_old']) {
            return response()->json([
                'success' => false,
                'message' => 'Chỉ số nước mới phải lớn hơn hoặc bằng chỉ số cũ'
            ], 401);
        }

        $room= Room::find($validatedData['room_id']);
        if(!$room || $room->status !== 'available'){
            return response()->json([
                'success' => false,
                'message' => 'Phòng không tồn tại hoặc phòng chưa ký hợp đồng'
            ], 404);
        }

        $utility = Utility::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Tiện ích đã được tạo thành công',
            'data'    => $utility->load('room')
        ], 201);
    }

    public function updateUtility(Request $request, $id)
    {
        $utility = Utility::find($id);

        if (!$utility) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy tiện ích'
            ], 404);
        }

        $validatedData = $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'month' => 'required|integer|min:1|max:12',
            'electric_old' => 'required|integer|min:0',
            'electric_new' => 'required|integer|min:0',
            'water_old' => 'required|integer|min:0',
            'water_new' => 'required|integer|min:0',
        ]);

        if ($validatedData['electric_new'] <= $validatedData['electric_old']) {
            return response()->json([
                'success' => false,
                'message' => 'Chỉ số điện mới phải lớn hơn hoặc bằng chỉ số cũ'
            ], 401);
        }

        if ($validatedData['water_new'] <= $validatedData['water_old']) {
            return response()->json([
                'success' => false,
                'message' => 'Chỉ số nước mới phải lớn hơn hoặc bằng chỉ số cũ'
            ], 401);
        }
        
        $room= Room::find($validatedData['room_id']);
        if(!$room){
            return response()->json([
                'success' => false,
                'message' => 'Phòng không tồn tại'
            ], 404);
        }

        $utility->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Tiện ích đã được cập nhật thành công',
            'data'    => $utility->load('room')
        ], 200);
    }

    public function deleteUtility($id)
    {
        $utility = Utility::find($id);

        if (!$utility) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy tiện ích'
            ], 404);
        }

        $utility->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tiện ích đã được xóa thành công'
        ], 200);
    }
}
