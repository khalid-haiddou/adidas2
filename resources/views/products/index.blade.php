<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        
        body {
            font-family: sans-serif;
            background-color: #f2f2f2;
        }
        .table {
            border-radius: 5px;
        }
        .table-bordered th, .table-bordered td {
            text-align: center;
            vertical-align: middle;
        }
        .table-bordered thead {
            background-color: #ddd;
        }
        .product-image img {
            border-radius: 50%;
        }
        .action-buttons {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div class="container py-5">
    <a href="/products/create" class="btn btn-primary">NEW PRODUCT</a>
    <a href="/categories" class="btn btn-primary">Categories</a>
        <h2 class="text-center text-primary">Product List</h2>
        <table id="productTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-primary">ID</th>
                    <th scope="col" class="text-primary">Title</th>
                    <th scope="col" class="text-primary">Description</th>
                    <th scope="col" class="text-primary">Price</th>
                    <th scope="col" class="text-primary">Category</th>
                    <th scope="col" class="text-primary">Image</th>
                    <th scope="col" class="text-primary">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td style="text-align: left;">{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="product-image">
                          
                                <img src="{{ asset('assets/' . $product->images) }}" width="30" alt="{{ $product->title }}">
                         
                        </td>
                        <td class="action-buttons" >
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"  >Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable();
        });
    </script>
</body>
</html>