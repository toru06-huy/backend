<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Utility;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getAllInvoice()
    {
        $invoices = Invoice::with('contract', 'utility')->get();
        return response()->json([
            'success' => true,
            'message' => 'Danh sách hóa đơn',
            'data'    => $invoices
        ], 200);
    }

    public function getInvoiceDetail($id)
    {
        $invoice = Invoice::with('contract', 'utility')->find($id);
        if (!$invoice) {
            return response()->json([
                'success' => false,
                'message' => 'Hóa đơn không tồn tại'
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'data'    => $invoice
            ], 200);
        }
    }

    public function createInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'utility_id' => 'required|exists:utilities,id',
            'room_price' => 'required|numeric|min:0',
            'electric_total' => 'required|numeric|min:0',
            'water_total' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid'
        ]);

        $contract = Contract::find($validatedData['contract_id']);
        if (!$contract) {
            return response()->json([
                'success' => false,
                'message' => 'Hợp đồng không tồn tại'
            ], 404);
        }
        $utility = Utility::find($validatedData['utility_id']);
        if (!$utility) {
            return response()->json([
                'success' => false,
                'message' => 'Tiện ích không tồn tại'
            ], 404);
        }
        if($contract->room_id !== $utility->room_id){
            return response()->json([
                'success' => false,
                'message' => 'Hợp đồng và tiện ích không cùng phòng'
            ], 400);
        }
        $invoice = Invoice::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Hóa đơn đã được tạo thành công',
            'data'    => $invoice->load('contract', 'utility')
        ], 201);
    }   

    public function updateInvoice(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return response()->json([
                'success' => false,
                'message' => 'Hóa đơn không tồn tại'
            ], 404);
        }

        $validatedData = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'utility_id' => 'required|exists:utilities,id',
            'room_price' => 'required|numeric|min:0',
            'electric_total' => 'required|numeric|min:0',
            'water_total' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid'
        ]);

        $contract = Contract::find($validatedData['contract_id']);
        if (!$contract) {
            return response()->json([
                'success' => false,
                'message' => 'Hợp đồng không tồn tại'
            ], 404);
        }
        $utility = Utility::find($validatedData['utility_id']);
        if (!$utility) {
            return response()->json([
                'success' => false,
                'message' => 'Tiện ích không tồn tại'
            ], 404);
        }

        if ($invoice->status === 'paid' && $validatedData['status'] === 'unpaid') {
            return response()->json([
                'success' => false,
                'message' => 'Không thể chuyển trạng thái từ đã thanh toán sang chưa thanh toán'
            ], 400);
        }

        $invoice->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Hóa đơn đã được cập nhật thành công',
            'data'    => $invoice->load('contract', 'utility')
        ], 200);
    }

    public function deleteInvoice($id)
    {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return response()->json([
                'success' => false,
                'message' => 'Hóa đơn không tồn tại'
            ], 404);
        }

        if ($invoice->status === 'paid') {
            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa hóa đơn đã thanh toán'
            ], 400);
        }

        $invoice->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hóa đơn đã được xóa thành công'
        ], 200);
    }
}
