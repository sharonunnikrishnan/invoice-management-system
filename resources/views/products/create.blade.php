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
        <h2>Create New Product</h2>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('dashboard') }}">
                    <button class="btn btn-info">Dashboard</button>
                </a>
                <a href="{{ route('products.index') }}">
                    <button class="btn btn-warning">Show All Products</button>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label> Details </label>
                            <textarea class="form-control" name="description"> </textarea>
                        </div>
                        <div class="col-sm-12 mt-5">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>

</body>

</html>
