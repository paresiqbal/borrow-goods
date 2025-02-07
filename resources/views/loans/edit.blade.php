@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Loan</h1>
    <form action="{{ route('loans.update', $loan->id) }}" method="POST"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="borrow_date" class="block text-gray-700 text-sm font-bold mb-2">Borrow Date (unchangeable):</label>
            <input type="date" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', $loan->borrow_date) }}"
                disabled
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="return_date" class="block text-gray-700 text-sm font-bold mb-2">Return Date:</label>
            <input type="date" id="return_date" name="return_date" value="{{ old('return_date', $loan->return_date) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="loan_status" class="block text-gray-700 text-sm font-bold mb-2">Loan Status:</label>
            <select name="loan_status" id="loan_status" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="Borrowed" {{ old('loan_status', $loan->loan_status) == 'Borrowed' ? 'selected' : '' }}>
                    Borrowed</option>
                <option value="Returned" {{ old('loan_status', $loan->loan_status) == 'Returned' ? 'selected' : '' }}>
                    Returned</option>
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Loan
            </button>
        </div>
    </form>
@endsection
