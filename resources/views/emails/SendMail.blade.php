@extends('admin.layout.layout_user')

@section('content')
<div>
    <h2>Quên mật khẩu</h2>

    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('users.password.email') }}" method="POST">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Gửi liên kết đổi mật khẩu</button>
    </form>
</div>
@endsection
