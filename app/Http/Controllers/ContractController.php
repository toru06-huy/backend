<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Room;
use App\Models\Tenant;
use Carbon\Carbon;

class ContractController extends Controller
{
    private function checkEndDay(): void
    {
        $contracts = Contract::where('status', 'active')
            ->where('end_date', '<', Carbon::today())
            ->with('room')
            ->get();
 
        foreach ($contracts as $contract) {
            $contract->update(['status' => 'terminated']);
            $contract->room?->update(['status' => 'available']);
        }
    }

    public function getAllContracts()
    {
        $this->checkEndDay();
        $contracts = Contract::with('room', 'tenant')->get();

        return response()->json([
            'success' => true,
            'message' => 'Danh sách hợp đồng',
            'data'    => $contracts
        ], 200);
    }

    public function getContractDetail($id)
    {
        $contract = Contract::with('room.utilities', 'tenant','invoices')->find($id);

        if (!$contract) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy hợp đồng'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $contract
        ], 200);
    }

    public function createContract(Request $request)
    {
        $validatedData = $request->validate([
            'tenant_id'      => 'required|exists:tenants,id',
            'room_id'        => 'required|exists:rooms,id',
            'start_date'     => 'required|date',
            'end_date'       => 'required|date|after:start_date',
            'deposit_amount' => 'required|numeric|min:0',
            'status'         => 'sometimes|in:active,terminated',
        ]);

        $tenant = Tenant::find($validatedData['tenant_id']);
        if (!$tenant) {
            return response()->json([
                'success' => false,
                'message' => 'Người thuê không tồn tại'
            ], 404);
        }

        $room = Room::find($validatedData['room_id']);
        if ($room->status !== 'available') {
            return response()->json([
                'success' => false,
                'message' => 'Phòng đã được thuê hoặc không có sẵn'
            ], 400);
        }

        $validatedData['status'] = $validatedData['status'] ?? 'active';
        $contract = Contract::create($validatedData);
        $room->update(['status' => 'rented']);

        return response()->json([
            'success' => true,
            'message' => 'Hợp đồng đã được tạo thành công',
            'data'    => $contract->load('tenant', 'room')
        ], 201);
    }

    public function deleteContract($id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy hợp đồng'
            ], 404);
        }
        $contract->room->update(['status' => 'available']);
        $contract->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hợp đồng đã được xóa thành công'
        ], 200);
    }

    public function updateContract(Request $request, $id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy hợp đồng'
            ], 404);
        }
        $validatedData = $request->validate([
            'tenant_id'      => 'sometimes|exists:tenants,id',
            'room_id'        => 'sometimes|exists:rooms,id',
            'start_date'     => 'sometimes|date',
            'end_date'       => 'sometimes|date|after:start_date',
            'deposit_amount' => 'sometimes|numeric|min:0',
            'status'         => 'sometimes|in:active,terminated',
        ]);

        $tenant = Tenant::find($validatedData['tenant_id']);
        if (!$tenant) {
            return response()->json([
                'success' => false,
                'message' => 'Người thuê không tồn tại'
            ], 404);
        }

        $room = Room::find($validatedData['room_id']);
        if ($room->status !== 'available' && $room->id !== $contract->room_id) {
            return response()->json([
                'success' => false,
                'message' => 'Phòng đã được thuê hoặc không có sẵn'
            ], 400);
        }

        if($validatedData['status'] === 'terminated' && $contract->status === 'active') {
            $contract->room->update(['status' => 'available']);
        }
        if($validatedData['status'] === 'active' && $contract->status === 'terminated') {
            $contract->room->update(['status' => 'rented']);
        }

        $contract->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Hợp đồng đã được cập nhật thành công',
            'data'    => $contract->load('tenant', 'room')
        ], 200);
    }
}
