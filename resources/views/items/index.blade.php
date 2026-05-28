@extends('layouts.app')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Danh sách sản phẩm</h1>
        <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Thêm mới</a>
    </div>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b">
                <th class="py-2">Item_code</th>
                <th class="py-2">Item_name</th>
                <th class="py-2">Số lượng</th>
                <th class="py-2">Ngày hết hạn</th>
                <th class="py-2">Note</th>
            </tr>
        </thead>
        <tbody>
          <tbody>
                @forelse($items as $item)
                <tr>
                    <td class="td-id">{{ $item->id }}</td>
                    <td class="td-code">{{ $item->item_code }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ number_format($item->quantity, 0) }}</td>
                    <td>{{ $item->expired_date ? $item->expired_date->format('d/m/Y') : '—' }}</td>
                    <td>
                        @if($item->note)
                            <span class="badge">{{ $item->note }}</span>
                        @else
                            <span style="color: var(--muted)">—</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-icon" title="Edit">✏️</a>
                            <form method="POST" action="{{ route('items.destroy', $item) }}"
                                  onsubmit="return confirm('Delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Delete">🗑</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <div class="icon">📦</div>
                            <p>No items found. <a href="{{ route('items.create') }}" style="color:var(--brand)">Add one now!</a></p>
                        </div>
                    </td>
                </tr>
                @endforelse
        </tbody>
    </table>
@endsection
