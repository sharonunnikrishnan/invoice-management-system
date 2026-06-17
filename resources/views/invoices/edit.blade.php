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
        <h2>Update Invoice</h2>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('dashboard') }}">
                    <button class="btn btn-info">Dashboard</button>
                </a>
                <a href="{{ route('invoices.index') }}">
                    <button class="btn btn-warning">Show All Invoices</button>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <form method="post" action="{{ route('invoices.update', $invoice->id) }}">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Customer</label>
                            <select class="form-control" name="customer_id">
                                <option>Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        @if ($invoice->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Product</label>
                            <select class="form-control" name="product_id" id="product_id">
                                <option>Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        @if ($product->id == $invoice->product_id) selected @endif>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Price</label>
                            <input type="text" name="price" id="price" class="form-control" readonly="true">
                        </div>
                        <div class="col-sm-6">
                            <label>Description</label>
                            <textarea id="description" class="form-control"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label>Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control"
                                value="{{ $invoice->quantity }}">
                        </div>
                        <div class="col-sm-6">
                            <label>Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control"
                                value="{{ $invoice->total_amount }}" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label> Invoice Date </label>
                            <input type="date" name="inoice_date" class="form-control"
                                value="{{ $invoice->inoice_date }}">
                        </div>
                        <div class="col-sm-6">
                            <label> Due Date </label>
                            <input type="date" name="due_date" class="form-control"
                                value="{{ $invoice->due_date }}">
                        </div>
                        <div class="col-sm-12 mt-5">
                            <button type="submit" class="btn btn-primary">Save Invoice</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>

</body>

</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function productDetails(productId) {
        if (productId) {

            $.ajax({
                url: '/get-product/' + productId,
                type: 'GET',
                success: function(response) {

                    $('#price').val(response.price);
                    $('#description').val(response.description);

                }
            });

        }
    }

    $(document).ready(function() {

        $('#product_id').change(function() {

            let productId = $(this).val();

            productDetails(productId);

        });

        let productId = $('#product_id').val();

        if (productId) {
            productDetails(productId);
        }

    });
</script>

<script>
    $(document).ready(function() {

        function calculateTotal() {

            let price = parseFloat($('#price').val()) || 0;
            let quantity = parseInt($('#quantity').val()) || 0;

            let total = price * quantity;

            $('#total_amount').val(total.toFixed(2));
        }

        $('#quantity').on('keyup change', function() {
            calculateTotal();
        });

    });
</script>
