<!DOCTYPE html>
<html>

<head>
    <title>Goods Management</title>
</head>

<body>
    <h1>Goods Management</h1>
    <a href="{{ route('goods.create') }}">Add New Good</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Goods Name</th>
                <th>Category</th>
                <th>Code</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($goods as $good)
                <tr>
                    <td>{{ $good->id }}</td>
                    <td>{{ $good->name }}</td>
                    <td>{{ $good->category }}</td>
                    <td>{{ $good->goods_code }}</td>
                    <td>{{ $good->stock }}</td>
                    <td>{{ $good->status }}</td>
                    <td>
                        <a href="{{ route('goods.edit', $good) }}">Edit</a>
                        <form action="{{ route('goods.destroy', $good) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
