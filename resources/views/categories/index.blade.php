<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom styles if needed -->
    <!-- Add custom styles for colors and buttons -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .table th, .table td {
            text-align: center;
        }

        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f0f9ff;
        }

        .action-icons {
            display: flex;
            justify-content: center;
        }

        .action-button {
            margin: 0 5px;
        }

        .update-icon, .delete-icon {
            color: #ffffff; /* White color for action icons */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/categories/create" class="btn btn-primary">ADD CATEGORY</a>
        <a href="/products" class="btn btn-primary"> ALL PRODUCTS </a>
        <h2 class="text-center">All Categories</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="action-icons">
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info action-button update-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M4.553 11.088L1.018 14.624a1.057 1.057 0 0 1-1.494 0 1.057 1.057 0 0 1 0-1.494l3.536-3.536L4.552 11.088zm12.732-9.853a1.727 1.727 0 0 0 0-2.437 1.727 1.727 0 0 0-2.437 0L11.85 3.516 14.384 6.05l1.902-1.902zM0 13.95V16h2.05l9.42-9.42-2.05-2.05L0 13.95z"/>
                        </svg>
                         </a>
                            
                            <!-- Updated delete button with a form -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                            <button type="submit" class="btn btn-danger action-button delete-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M1.5 2.5A2.5 2.5 0 0 1 4 0h8a2.5 2.5 0 0 1 2.5 2.5V4H14a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h1.5V2.5zM6 12a1 1 0 0 1 1 1v1a1 1 0 0 1-2 0v-1a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v1a1 1 0 0 1-2 0v-1a1 1 0 0 1 1-1z"/>
                                    </svg>
                            </button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>