<!DOCTYPE html>
<html>

<head>
    <title>Borrowers Management</title>
</head>

<body>
    <h1>Borrowers</h1>
    <a href="{{ route('borrowers.create') }}">Add New Borrower</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowers as $borrower)
                <tr>
                    <td>{{ $borrower->id }}</td>
                    <td>{{ $borrower->name }}</td>
                    <td>{{ $borrower->email }}</td>
                    <td>{{ $borrower->phone }}</td>
                    <td>{{ $borrower->position }}</td>
                    <td>
                        <a href="{{ route('borrowers.edit', $borrower) }}">Edit</a>
                        <form action="{{ route('borrowers.destroy', $borrower) }}" method="POST" style="display:inline;">
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
