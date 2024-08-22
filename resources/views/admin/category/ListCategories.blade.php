@extends('admin.layout.default')

@section('titles')
@parent List Categories
@endsection

@push('style')

@endpush

@section('content')
<table class="table table-border">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name_Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                    data-bs-id="{{ $category->id_category }}">Delete</button>
                <button class="btn btn-info btn-sm"><a href="
                    {{ route('admin.category.updateCategory', $category->id_category )}}">Update</a></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
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
                    <p class="text-danger">Bạn có muốn xóa category không ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Quay lại</button>
                    <button type="submit" class="btn btn-danger btn-sm">Xác nhận xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{ $categories -> links('pagination::bootstrap-5')}}
@endsection
@push('scripts')
<script>
    const exampleModal = document.getElementById('deleteModal')
    if (exampleModal) {
    exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const id_category = button.getAttribute('data-bs-id')
        
        let formDelete = document.getElementById('formDelete')
        formDelete.setAttribute('action', '{{ route("admin.category.deleteCategory") }}'
            + '?id_category=' + id_category
        )
    })
    }
</script>
@endpush