@extends('admin.layout.default')

@section('titles')
    @parent Add Category
@endsection
@push('style')
    
@endpush
@section('content')
    {{-- <h3>Add Category</h3> --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="errors-messages" style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.category.addPostCategory')}}" method="post">
        @csrf
        <h3>Add Category</h3>
        <div class="mb-3">
            <label for="">Category Name : </label>
            <input type="text" name="name" placeholder="Enter your name Category" class="form-control" ><br>
            {{-- @if ($errors->has('name'))
                <span class="errors-messages">
                    {{ $errors->first('name') }}
                </span>
            @endif --}}
            <button class="btn btn-primary">Add Category</button>
        </div>
    </form>
@endsection
@push('scripts')
    
@endpush