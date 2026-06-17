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
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>
                                <h4>Customer : </h4> {{ $invoices->customer->name }}
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <h4>Product : </h4> {{ $invoices->product->name }}
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <h4>Price : </h4> {{ $invoices->product->price }}
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <h4> Description : </h4> {{ $invoices->product->description }}
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <h4>Quantity : </h4> {{ $invoices->quantity }}
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <h4>Total Amount : </h4>{{ $invoices->total_amount }}
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <h4> Invoice Date : </h4> {{ $invoices->inoice_date }}
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <h4> Due Date : </h4> {{ $invoices->due_date }}
                            </label>
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
