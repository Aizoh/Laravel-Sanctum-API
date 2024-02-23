<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $invoices = Invoice::all();
        $data = [
            'invoices'=> $invoices,
        ];
        // return response()->json($data, 200);
        return view('invoice.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
        return response()->json($invoice, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function download(Invoice $invoice) {
        if (!$invoice) {
            return response()->json(['error' => 'Invoice not found'], 404);
        }
    
        try {
            $data = [
                'invoice' => $invoice,
            ];
    
            $pdf = Pdf::loadView('invoice', $data);
    
            //return $pdf->download(); to download just for viewing
            return $pdf->stream(); 

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error generating PDF'. $e], 500);
        }
}
}