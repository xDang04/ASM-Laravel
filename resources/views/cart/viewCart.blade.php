@extends('admin.layout.layout_user')

@section('titles')

@section('content')
<div class="container">
    <h1>Giỏ hàng của bạn</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (empty($cart))
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $id => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <img src="/{{($item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px;">
                        </td>
                        <td>{{ number_format($item['price']) }} VNĐ</td>
                        <td>
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 60px;" 
                                   onchange="updateTotal(this, {{ $item['price'] }}, '{{ $id }}')">
                        </td>
                        <td class="total-price" id="total-{{ $id }}">{{ number_format($item['price'] * $item['quantity']) }} VNĐ</td>
                        <td>
                            <form action="{{ route('users.cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
function updateTotal(quantityInput, price, id) {
    const quantity = quantityInput.value;
    const totalPrice = price * quantity;
    
    document.getElementById('total-' + id).innerText = totalPrice.toLocaleString() + ' VNĐ';
}
</script>
@endsection
