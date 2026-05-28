<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    /**
     * Display a listing of items. (Q1.4)
     */
    public function index()
    {
        $items = ItemSale::orderBy('id')->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new item. (Q1.3)
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created item. (Q1.2 + Q1.3)
     */
    public function store(Request $request)
{
    $request->validate([
        'item_code' => [
            'required',
            'max:6',
            'regex:/^[a-zA-Z0-9\s]+$/'
        ],
        'item_name' => [
            'required',
            'max:50',
            'regex:/^[a-zA-Z0-9\s]+$/'
        ],
        'quantity' => 'nullable|numeric',
        'expired_date' => 'nullable|date',
        'note' => 'nullable|max:60',
    ], [
        'item_code.required' => 'Item code không được bỏ trống',
        'item_code.regex' => 'Item code không được chứa ký tự đặc biệt',
        'item_name.required' => 'Item name không được bỏ trống',
        'item_name.regex' => 'Item name không được chứa ký tự đặc biệt',
    ]);

    ItemSale::create($request->all());

    return redirect()->route('items.index')
        ->with('success', 'Thêm item thành công!');
}

    /**
     * Show the form for editing an item. (Q1.5)
     */
    public function edit(ItemSale $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified item. (Q1.2 + Q1.5)
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'item_code' => [
            'required',
            'max:6',
            'regex:/^[a-zA-Z0-9\s]+$/'
        ],
        'item_name' => [
            'required',
            'max:50',
            'regex:/^[a-zA-Z0-9\s]+$/'
        ],
        'quantity' => 'nullable|numeric',
        'expired_date' => 'nullable|date',
        'note' => 'nullable|max:60',
    ]);

    $item = ItemSale::findOrFail($id);
    $item->update($request->all());

    return redirect()->route('items.index')
        ->with('success', 'Cập nhật item thành công!');
}

    /**
     * Remove the specified item.
     */
    public function destroy(ItemSale $item)
    {
        $item->delete();
        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully!');
    }
}
