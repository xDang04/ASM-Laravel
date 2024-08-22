@extends('admin.layout.default')

@section('titles')
@parent Update Category
@endsection
@push('style')

@endpush
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
<form action="{{ route('admin.category.updatePutCategory', $categories->id_category)}}" method="post">
    @method('put')
    @csrf
    <h3>Update Category</h3>
    <div class="mb-3">
        <label for="">Category Name : </label>
        <input type="text" name="name" placeholder="Enter your name Category" class="form-control"
            value="{{ $categories->name }}"><br>
        <button class="btn btn-primary">Update Category</button>
    </div>
</form>
@endsection
@push('scripts')

@endpush