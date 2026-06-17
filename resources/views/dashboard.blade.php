@php
    use App\Models\Invoice;
    $invoices = Invoice::get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <center>
            <h1>Invoice Management System </h1>

            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('customers.index') }}">
                        <button class="btn btn-primary">Customers</button>
                    </a>
                    <a href="{{ route('products.index') }}">
                        <button class="btn btn-info">Products</button>
                    </a>
                    <a href="{{ route('invoices.index') }}">
                        <button class="btn btn-success">Invoices</button>
                    </a>
                </div>
            </div>
        </center>
        <div class="row mt-5">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <tr>
                        <th>Sl. No.</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th>Qty.</th>
                        <th>Price</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                    @php $i=0; @endphp
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $i += 1 }}</td>
                            <td>{{ $invoice->customer->name }}</td>
                            <td>{{ $invoice->product->name }}</td>
                            <td>{{ $invoice->inoice_date }}</td>
                            <td>{{ $invoice->due_date }}</td>
                            <td>{{ $invoice->quantity }}</td>
                            <td>{{ $invoice->product->price }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td>
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('invoices.edit', $invoice->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('invoices.show', $invoice->id) }}"
                                        class="btn btn-success">View</a>
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <center>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </center>
</body>

</html>
