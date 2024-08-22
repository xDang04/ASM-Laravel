<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
@extends ('admin.layout.default')
@section('titles')
       @parent  List User
   @endsection


<style>
    a {
        text-decoration: none
    }
</style>

<body>



    @section('content')


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>FullName</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                {{-- <th>Gender</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ListUsers as $key => $users)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $users->fullname }}</td>
                <td>{{ $users->username }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->phone }}</td>
                <td>{{ $users->address }}</td>
                <td>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                        data-bs-id="{{ $users->id }}">Delete</button>
                    <button class="btn btn-info btn-sm"><a href="
                    {{ route('admin.users.updateUser', $users->id ) }}">Update</a></button>
                    {{-- <form action="{{ route('admin.users.deleteUser', $users->id)}}" method="post">
                        @method('delete')
                        @csrf --}}

                        {{-- <button class="btn btn-warning"><a style="color:aliceblue" href="">Update</a></button> --}}
                        {{--
                    </form> --}}
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
            formDelete.setAttribute('action', '{{ route("admin.users.deleteUser") }}'
                + '?idUser=' + id
            )
        })
        }
    </script>
    @endpush
</body>

</html>