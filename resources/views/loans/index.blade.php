@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Borrowers</h1>
    <a href="{{ route('borrowers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add New Borrower
    </a>
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Name</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Phone</th>
                    <th class="py-2 px-4 text-left">Position</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($borrowers as $borrower)
                    <tr>
                        <td class="py-2 px-4">{{ $borrower->id }}</td>
                        <td class="py-2 px-4">{{ $borrower->name }}</td>
                        <td class="py-2 px-4">{{ $borrower->email }}</td>
                        <td class="py-2 px-4">{{ $borrower->phone }}</td>
                        <td class="py-2 px-4">{{ $borrower->position }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('borrowers.edit', $borrower) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
                                Edit
                            </a>
                            <form action="{{ route('borrowers.destroy', $borrower) }}" method="POST" class="inline-block">
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
