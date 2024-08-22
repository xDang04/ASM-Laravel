@extends('admin.layout.default')

@section('title')
    CHi teiet
@endsection

@push('style')
    <style>
        .image-product{
        width: 100px;
        height: 100px;
        object-fit: cover
    }
    </style>
@endpush

@section('content')
    <p>Name Product : 
        <span class="font-weight-bold"> {{ $products->name}}</span>
    </p>
    <p>Price Product : 
        <span class="font-weight-bold"> {{ $products->price}}</span>
    </p>
    {{-- <p>Category : 
        @foreach ($listProducts as $key => $products)
        <span class="font-weight-bold"> {{ $products->category}}</span>
        @endforeach
    </p> --}}
    <p>Image Product : 
        <img src="/{{ $products -> image}}" alt="Errors" class="image-product">
    </p>
    <button class="btn btn-info"><a href=" {{ route('admin.products.listProducts')}}">Back</a></button>
@endsection

@push('scripts')
    
@endpush