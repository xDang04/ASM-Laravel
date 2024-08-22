<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
    <h2>Quên mật khẩu</h2>
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

    <form action="{{ route('users.checkEmail') }}" method="POST">
        @csrf
        <div>
            <label for="">Nhập Email của bạn</label>
            <label for="email">Email:</label>
            <input type="email" class="form-control mb-3 mt-3" id="email" name="email" 
            required placeholder="Nhập email của bạn ở đây">
        </div>
        <div>
            <button class="btn btn-secondary" type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
