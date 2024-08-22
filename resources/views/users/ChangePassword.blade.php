<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        margin-left: 50px;
    }
    .form-control{
        width: 80%;
    }
</style>
<body>
    <h2 class="mb-5">Đổi mật khẩu</h2>
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.changePassword') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <div>
            <label for="password">Nhập mật khẩu mới:</label>
            <input type="text" class="form-control mb-3 mt-3" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Nhập lại mật khẩu mới:</label>
            <input type="text" class="form-control mb-3 mt-3" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <button class="btn btn-danger" type="submit">Change Password</button>
        </div>
    </form>
</body>
</html>
