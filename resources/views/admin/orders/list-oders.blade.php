@extends('admin.layout.default')

@section('content')
<div class="container">
    <h1>Quản lý Đơn hàng</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->username }}</td>
                    <td>{{ number_format($order->total_price) }} VNĐ</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.show', $order->id) }}" class="btn btn-info">View</a> --}}
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
