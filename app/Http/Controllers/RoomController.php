<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function getAllRooms()
    {
        $rooms = Room::all();

        return response()->json([
            'success' => true,
            'message' => 'Danh sách phòng',
            'data'    => $rooms
        ], 200);
    }

    public function getRoomDetail($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy phòng'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $room
        ], 200);
    }
    public function createRoom(request $request){
      $validatedData = $request->validate([
        'room_number' => 'required|integer|max:5',
        'price' => 'required|decimal:2',
        'status' => 'required|in:available',
      ]);

      $room = Room::create($validatedData);

      return response()->json([
        'success' => true,
        'message' => 'Phòng đã được tạo thành công',
        'data' => $room
      ], 201);
    }  
    public function updateRoom(request $request, $id){
      $room = Room::find($id);

      if (!$room) {
          return response()->json([
              'success' => false,
              'message' => 'Không tìm thấy phòng'
          ], 404);
      }

      $validatedData = $request->validate([
        'room_number' => 'sometimes|required|integer|max:5',
        'price' => 'sometimes|required|decimal:2',
        'status' => 'sometimes|required|in:available',
      ]);

      $room->update($validatedData);

      return response()->json([
        'success' => true,
        'message' => 'Phòng đã được cập nhật thành công',
        'data' => $room
      ], 200);
    }

    public function deleteRoom($id){
      $room = Room::find($id);

      if (!$room) {
          return response()->json([
              'success' => false,
              'message' => 'Không tìm thấy phòng'
          ], 404);
      }

      $room->delete();

      return response()->json([
        'success' => true,
        'message' => 'Phòng đã được xóa thành công'
      ], 200);
    }

}

