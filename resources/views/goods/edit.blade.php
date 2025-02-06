@extends('layouts.app')

@section('content')
    <h1>Edit Good</h1>
    <form action="{{ route('goods.update', $good->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Goods Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $good->name) }}" required>
        </div>
        <div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ old('category', $good->category) }}" required>
        </div>
        <div>
            <label for="goods_code">Goods Code:</label>
            <input type="text" name="goods_code" id="goods_code" value="{{ old('goods_code', $good->goods_code) }}"
                required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $good->stock) }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="Available" {{ old('status', $good->status) == 'Available' ? 'selected' : '' }}>Available
                </option>
                <option value="Borrowed" {{ old('status', $good->status) == 'Borrowed' ? 'selected' : '' }}>Borrowed
                </option>
            </select>
        </div>
        <div>
            <button type="submit">Update Good</button>
        </div>
    </form>
@endsection
