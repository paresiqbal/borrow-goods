@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Loans</h1>
    <a href="{{ route('loans.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add New Loan
    </a>
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Borrower Name</th>
                    <th class="py-2 px-4 text-left">Good Name</th>
                    <th class="py-2 px-4 text-left">Borrow Date</th>
                    <th class="py-2 px-4 text-left">Return Date</th>
                    <th class="py-2 px-4 text-left">Status</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($loans as $loan)
                    <tr>
                        <td class="py-2 px-4">{{ $loan->id }}</td>
                        <td class="py-2 px-4">{{ $loan->borrower->name }}</td>
                        <td class="py-2 px-4">{{ $loan->good->name }}</td>
                        <td class="py-2 px-4">{{ $loan->borrow_date }}</td>
                        <td class="py-2 px-4">{{ $loan->return_date ?? 'N/A' }}</td>
                        <td class="py-2 px-4">{{ $loan->loan_status }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('loans.edit', $loan) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
                                Edit
                            </a>
                            <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
