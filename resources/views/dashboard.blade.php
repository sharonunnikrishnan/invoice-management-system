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
                        <button class="btn btn-success">Invoice</button>
                    </a>
                </div>
            </div>
        </center>
        <div class="row mt-5">
            <div class="col-sm-12">

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
