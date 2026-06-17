<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Mail\InvoiceMail;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('invoices.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $total = $product->price * $request->quantity;

        $invoice = Invoice::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'inoice_date' => $request->inoice_date,
            'due_date' => $request->due_date,
            'quantity' => $request->quantity,
            'total_amount' => $total,
        ]);

         Mail::to(
            $invoice->customer->email
        )->send(
            new InvoiceMail($invoice)
        );

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoices = Invoice::with('customer','product')->findOrFail($id);
        return view('invoices.show', compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::where('id', $id)->first();
        $customers = Customer::all();
        $products = Product::all();
        return view('invoices.edit', compact('invoice','customers','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, string $id)
    {
        $invoice = Invoice::where('id', $id)->first();
        $product = Product::where('id',$invoice->product_id)->first();

        $invoice->update([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'inoice_date' => $request->inoice_date,
            'due_date' => $request->due_date,
            'quantity' => $request->quantity,
            'total_amount' => $product->price * $request->quantity,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Invoice::where('id', $id)->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
