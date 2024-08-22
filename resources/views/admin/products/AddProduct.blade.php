@extends('admin.layout.default');

@section('titles')
    @parent Add Product
@endsection
    
    @section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.products.addPostProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Add Product</h3>
        <div class="mb-3">
            <label for="">Product Name : </label>
            <input type="text" name="name" placeholder="Enter your name product" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="">Product Price : </label>
            <input type="text" name="price" placeholder="Enter your price product" class="form-control" ><br>
        </div>
        <div class="mb-3">
            <label for="">Category : </label>
            <select name="category" id="category" class="btn btn-outline-secondary">
                @foreach($categories as $category)
                    <option value="{{ $category->id_category }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="">Product Image : </label>
            <input type="file" name="image" accept="imageProduct"><br>
            <button class="btn btn-primary btn-sm">Add Product</button>
        </div>
    </form>
    @endsection

