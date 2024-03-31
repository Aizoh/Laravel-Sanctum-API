<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $invoices = Invoice::all();
        $data = [
            'invoices' => $invoices,
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
        return view('invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $invoice = Invoice::create($request->all());
        return redirect()->back()->with('success', 'Form submitted successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
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
            return response()->json(['error' => 'Error generating PDF' . $e], 500);
        }
        //return response()->json($invoice, 200);
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

    public function download(Invoice $invoice)
    {
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
            return response()->json(['error' => 'Error generating PDF' . $e], 500);
        }
    }

    public function send(Invoice $invoice){

        $url = route('invoices.show', $invoice);
        $data = [
            'invoice' => $invoice,
        ];
    
        $pdf = Pdf::loadView('invoice', $data);
        //$pdf = $pdf->stream();
    
        // Check if $pdf is not null before sending the email
        if ($pdf) {
            Mail::to($invoice->client_email)->send(new InvoiceMail($invoice, $pdf, $url));
        } else {
            // Handle the case where $pdf is null (e.g., log an error)
            abort(404);
        }

    }
}
