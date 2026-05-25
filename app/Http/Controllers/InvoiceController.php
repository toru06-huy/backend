<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getAllInvoice()
    {
        $invoices = Invoice::with('contract')->get();
        return response()->json([
            'success' => true,
            'message' => 'Danh sách hóa đơn',
            'data'    => $invoices
        ], 200);
    }

    public function getInvoiceDetail($id)
    {
        $invoice = Invoice::with('contract')->find($id);
        if ($invoice) {
            return response()->json([
                'success' => true,
                'data'    => $invoice
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hóa đơn không tồn tại'
            ], 404);
        }
    }

    public function createInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $contract = Contract::find($validatedData['contract_id']);
        if (!$contract) {
            return response()->json([
                'success' => false,
                'message' => 'Hợp đồng không tồn tại'
            ], 404);    
        }
        $invoice = Invoice::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Hóa đơn đã được tạo thành công',
            'data'    => $invoice->load('contract')
        ], 201);
    }

    
}
