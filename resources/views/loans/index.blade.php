<!DOCTYPE html>
<html>

<head>
    <title>Loan Management</title>
</head>

<body>
    <h1>Loan Records</h1>
    <a href="{{ route('loans.create') }}">Create New Loan</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Borrower</th>
                <th>Good</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->borrower->name }}</td>
                    <td>{{ $loan->good->name }}</td>
                    <td>{{ $loan->borrow_date }}</td>
                    <td>{{ $loan->return_date ?? 'N/A' }}</td>
                    <td>{{ $loan->loan_status }}</td>
                    <td>
                        <a href="{{ route('loans.edit', $loan) }}">Update</a>
                        <form action="{{ route('loans.destroy', $loan) }}" method="POST" style="display:inline;">
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
