
<!DOCTYPE html>
<html>
<head>
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h1>Yêu cầu đặt lại mật khẩu</h1>
    <p>Bạn đã yêu cầu đặt lại mật khẩu. Nhấn vào liên kết bên dưới để đặt lại mật khẩu của bạn:</p>
    <a href="{{ url('users/password/reset', $token) }}?email={{ $email }}">Đặt lại mật khẩu</a>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
</body>
</html>
