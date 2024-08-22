@extends('admin.layout.layout_user')

@section('content')
<div>
    <h2>Đổi mật khẩu</h2>

    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('users.password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
        {{-- <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div> --}}
        <div>
            <label for="password">Mật khẩu mới:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit">Đặt lại mật khẩu</button>
    </form>
    
</div>
@endsection
