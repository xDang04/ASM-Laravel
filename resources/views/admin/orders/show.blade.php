@extends('admin.layout.default')

@section('content')
<div class="container">
    <h1>Chi tiết Đơn hàng #{{ $order->id }}</h1>
    <p>User: {{ $order->user->name }}</p>
    <p>Total Price: {{ number_format($order->total_price) }} VNĐ</p>
    <p>Status: {{ $order->status }}</p>

    <h2>Chi tiết sản phẩm</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price) }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
