@extends('layouts.app')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Sửa đơn hàng</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block">Item_code</label>
            <input type="text" name="item_code" value="{{ $item->item_code }}" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block">Item_name</label>
            <input type="text" name="item_name" value="{{ $item->item_name }}" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block">Số lượng</label>
            <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-full border p-2 rounded">
        </div>
        div>
            <label class="block">Ngày hết hạn</label>
            <input type="date" name="expired_date" value="{{ $item->expired_date ? $item->expired_date->format('Y-m-d') : '' }}" class="w-full border p-2 rounded">
        <div>
            <label class="block">Note</label>
            <textarea name="note" class="w-full border p-2 rounded">{{ $item->note }}</textarea>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật</button>
    </form>
@endsection
