<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{
    public function getAllContracts()
    {
        $contracts = Contract::with('room', 'tenant')->get();

        return response()->json([
            'success' => true,
            'message' => 'Danh sách hợp đồng',
            'data'    => $contracts
        ], 200);
    }

    public function getContractDetail($id)
    {
        $contract = Contract::with('room', 'tenant')->find($id);

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
}
