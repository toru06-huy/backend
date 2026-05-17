<?php

namespace App\Http\Controllers;
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

    
}
