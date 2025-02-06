@extends('layouts.app')

@section('content')
    <h1>Create New Good</h1>
    <form action="{{ route('goods.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Goods Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" required>
        </div>
        <div>
            <label for="goods_code">Goods Code:</label>
            <input type="text" name="goods_code" id="goods_code" value="{{ old('goods_code') }}" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Borrowed" {{ old('status') == 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
            </select>
        </div>
        <div>
            <button type="submit">Create Good</button>
        </div>
    </form>
@endsection
