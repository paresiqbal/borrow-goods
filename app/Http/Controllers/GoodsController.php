<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Good::all();
        return view('goods.index', compact('goods'));
    }

    public function create()
    {
        return view('goods.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'category'   => 'required|string|max:255',
            'goods_code' => 'required|string|max:255|unique:goods,goods_code',
            'stock'      => 'required|integer',
            'status'     => 'required|in:Available,Borrowed'
        ]);

        Good::create($data);

        return redirect()->route('goods.index')->with('success', 'Good created successfully');
    }

    public function show(Good $good)
    {
        return view('goods.show', compact('good'));
    }

    public function edit(Good $good)
    {
        return view('goods.edit', compact('good'));
    }

    public function update(Request $request, Good $good)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'category'   => 'required|string|max:255',
            'goods_code' => 'required|string|max:255|unique:goods,goods_code,' . $good->id,
            'stock'      => 'required|integer',
            'status'     => 'required|in:Available,Borrowed'
        ]);

        $good->update($data);

        return redirect()->route('goods.index')->with('success', 'Good updated successfully');
    }

    public function destroy(Good $good)
    {
        $good->delete();
        return redirect()->route('goods.index')->with('success', 'Good deleted successfully');
    }
}
