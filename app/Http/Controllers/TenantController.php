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
}
