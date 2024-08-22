@extends('admin.layout.layout_user')

@section('titles')
@parent Store
@endsection

@push('style')
<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .card-group {
        flex: 1 1 calc(25% - 20px);
        box-sizing: border-box;
        margin-bottom: 20px;
    }

    .product {
        width: 230px;
        height: 380px;
        align-items: center;
        text-align: center;
        border: 1px solid #ddd;
        padding: 5px;
        background-color: #fff;
        border-radius: 10px;
    }

    .card-img-top {
        width: 100%;
        height: 250px;
        margin-bottom: 10px;
        object-fit: cover;
        border-radius: 10px;
    }

    .price {
        text-align: left;
    }
</style>
@endpush

@section('content')
<form method="GET" action="{{ route('users.search.category') }}">
    <div class="form-group">
        <label for="category">Select Category:</label>
        <select name="category_id" id="category" class="form-control">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id_category }}" 
                {{ (isset($selectedCategoryId) && $selectedCategoryId == $category->id_category) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
        
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>
<div class="card-container">
    @foreach ($products as $product)
    <div class="card-group">
        <div class="product">
            <img src="/{{ $product->image }}" class="card-img-top" alt="...">
            <h6 class="card-text">{{ $product->name }}</h6>
            <div class="price">
                <b class="card-text">Giá:</b> <i>{{ number_format($product->price) }} VNĐ</i>
            </div>
            <form action="{{ route('users.cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
