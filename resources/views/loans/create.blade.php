@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create New Loan</h1>
    <form action="{{ route('loans.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="borrower_id" class="block text-gray-700 text-sm font-bold mb-2">Borrower:</label>
            <select name="borrower_id" id="borrower_id" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select Borrower</option>
                @foreach ($borrowers as $borrower)
                    <option value="{{ $borrower->id }}" {{ old('borrower_id') == $borrower->id ? 'selected' : '' }}>
                        {{ $borrower->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="good_id" class="block text-gray-700 text-sm font-bold mb-2">Item (Good):</label>
            <select name="good_id" id="good_id" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select Good</option>
                @foreach ($goods as $good)
                    <option value="{{ $good->id }}" {{ old('good_id') == $good->id ? 'selected' : '' }}>
                        {{ $good->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="borrow_date" class="block text-gray-700 text-sm font-bold mb-2">Borrow Date:</label>
            <input type="date" id="borrow_date" name="borrow_date" value="{{ old('borrow_date') }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Loan
            </button>
        </div>
    </form>
@endsection
