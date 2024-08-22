{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head> --}}
@extends ('admin.layout.default')
@section('titles')
    @parent List Products
@endsection
@push('style')
<style>
    a {
        text-decoration: none
    }

    .img-product {
        width: 50px;
        height: 50px;
        object-fit: cover
    }
</style>
@endpush

<body>



    @section('content')

    {{-- @if ('message')
    <div class="alert alert-primary" role="alert">
        {{ session('message') }}
    </div>
    @endif --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listProducts as $key => $products)
            <tr>
                <td>{{ $key + 1 }}</td>
                {{-- <td>{{ $products->id }}</td> --}}
                <td>{{ $products->name }}</td>
                <td>{{ $products->price }}</td>
                <td>{{ $products->category}}</td>
                <td>
                    <img class="img-product" src="/{{ ($products -> image) }}" alt="Errors">
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                        data-bs-id="{{ $products->id }}">Delete</button>
                    <button class="btn btn-warning btn-sm"><a href="
                            {{ route('admin.products.detailProduct', $products->id)}}">Show Detail</a></button>
                    <button class="btn btn-info btn-sm"><a href="
                                {{ route('admin.products.updateProduct', $products->id)}}">Update</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listProducts -> links('pagination::bootstrap-5')}}
    {{-- Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Cảnh Báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDelete">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p class="text-danger">Bạn có muốn xóa không ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Quay lại</button>
                        <button type="submit" class="btn btn-danger btn-sm">Xác nhận xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>
        const exampleModal = document.getElementById('deleteModal')
        if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const id = button.getAttribute('data-bs-id')
            
            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route("admin.products.deleteProduct") }}'
                + '?idProduct=' + id
            )
        })
        }
    </script>
    @endpush
{{-- </body>

</html> --}}