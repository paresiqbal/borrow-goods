@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Goods Management</h1>
    <a href="{{ route('goods.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add New Good
    </a>
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Goods Name</th>
                    <th class="py-2 px-4 text-left">Category</th>
                    <th class="py-2 px-4 text-left">Code</th>
                    <th class="py-2 px-4 text-left">Stock</th>
                    <th class="py-2 px-4 text-left">Status</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($goods as $good)
                    <tr>
                        <td class="py-2 px-4">{{ $good->id }}</td>
                        <td class="py-2 px-4">{{ $good->name }}</td>
                        <td class="py-2 px-4">{{ $good->category }}</td>
                        <td class="py-2 px-4">{{ $good->goods_code }}</td>
                        <td class="py-2 px-4">{{ $good->stock }}</td>
                        <td class="py-2 px-4">{{ $good->status }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('goods.edit', $good) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
                                Edit
                            </a>
                            <form action="{{ route('goods.destroy', $good) }}" method="POST" class="inline-block">
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
