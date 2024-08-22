<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
</head>
@push('style')
<style>
    .img-product {
        width: 50px;
        height: 50px;
        object-fit: cover
    }
</style>
@endpush

<body>
    @extends('admin.layout.default');

    @section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.products.updatePutProduct', $product->id)}}" method="post"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <h3>Update Product</h3>
        <div class="mb-3">
            <label for="">Product Name : </label>
            <input type="text" name="name" placeholder="Enter your name product" class="form-control" 
                value="{{ $product->name}}">
        </div>
        <div class="mb-3">
            <label for="">Product Price : </label>
            <input type="text" name="price" placeholder="Enter your price product" class="form-control" 
                value="{{ $product->price}}"><br>
        </div>
        <div class="mb-3">
            <label for="">Category : </label>
            <select name="category" id="">
                @foreach ($categories as $cate)
                <option 
                @if ($product->id_category == $cate->id_category)
                    selected
                @endif
                value="{{ $cate->id_category }}">{{ $cate -> name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="">Product Image : </label><br>
            <img src="/{{ $product->image }} " alt="Errors" class="img-product"><br>
            <input type="file" name="image" accept="imageProduct"><br>
            <button class="btn btn-primary btn-sm">Update Product</button>
        </div>
    </form>
    @endsection

</body>

</html>