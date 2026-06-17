<h2>Invoice Details</h2>

<p>Customer : {{ $invoice->customer->name }}</p>

<p>Product : {{ $invoice->product->name }}</p>

<p>Quantity : {{ $invoice->quantity }}</p>

<p>Total : {{ $invoice->total_amount }}</p>
