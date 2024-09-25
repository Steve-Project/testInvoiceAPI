<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getInvoices(): \Illuminate\Http\JsonResponse
    {
        $invoices = Invoice::with('lines')
            ->orderBy('sent_at')
            ->paginate(20);

        return response()->json([
            'invoices' => $invoices->map(function ($invoice) {
                return [
                    'customer' => $invoice->customer,
                    'number' => $invoice->number,
                    'status' => $invoice->status,
                    'sent_at' => $invoice->sent_at,
                    'paid_at' => $invoice->paid_at,
                    'total' => round($invoice->amount, 2)
                ];
            }),
            'pagination' => (new \App\Helpers\PaginatorHelper)->getPaginatorDetail($invoices)
        ]);
    }
}
