@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Thêm sản phẩm</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block">Item_code</label>
            <input type="text" name="item_code" value="{{ old('item_code') }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Item_name</label>
            <input type="text" name="item_name" value="{{ old('item_name') }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Số lượng</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Ngày hết hạn</label>
            <input type="date" name="expired_date" value="{{ old('expired_date') }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">Note</label>
            <textarea name="note" class="w-full border p-2 rounded">{{ old('note') }}</textarea>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Lưu sản phẩm
        </button>
    </form>
@endsection
