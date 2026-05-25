<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function getAllTenants()
    {
        // Lấy toàn bộ 20 người thuê kèm địa chỉ
        $tenants = Tenant::all();

        return response()->json([
            'success' => true,
            'message' => 'Danh sách người thuê',
            'data'    => $tenants
        ], 200);
    }

    public function getTenantDetail($id)
    {
        $tenant = Tenant::find($id);

        if (!$tenant) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người thuê'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $tenant
        ], 200);
    }
    public function createTenant(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:tenants,phone',
            'identity_card' => 'required|string|max:20|unique:tenants,identity_card',
            'address' => 'required|string|max:255',
        ],[
                'phone.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số khác.',
                'identity_card.unique' => 'Số CMND/CCCD đã tồn tại, vui lòng nhập số khác.',
        ]);

        $tenant = Tenant::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Người thuê đã được tạo thành công',
            'data' => $tenant
        ], 201);
    }
    public function updateTenant(Request $request, $id)
    {
        $tenant = Tenant::find($id);

        if (!$tenant) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người thuê'
            ], 404);
        }

        $validatedData = $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20|unique:tenants,phone',
            'identity_card' => 'sometimes|required|string|max:20|unique:tenants,identity_card',
            'address' => 'sometimes|required|string|max:255',
        ],[
            'phone.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số khác.',
            'identity_card.unique' => 'Số CMND/CCCD đã tồn tại, vui lòng nhập số khác.',
        ]);

        $tenant->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Người thuê đã được cập nhật thành công',
            'data' => $tenant
        ], 200);
    }

    public function deleteTenant($id)
    {
        $tenant = Tenant::find($id);

        if (!$tenant) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người thuê'
            ], 404);
        }

        $tenant->delete();

        return response()->json([
            'success' => true,
            'message' => 'Người thuê đã được xóa thành công'
        ], 200);
    }
    
}
