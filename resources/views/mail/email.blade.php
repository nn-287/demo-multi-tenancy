<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Tenancy Platform</title>
</head>
<body>
    <h1>Welcome, {{ $name }}!</h1>
    <p>Your tenancy request has been accepted, and your tenant account has been created successfully.</p>
    <p>Here are your credentials:</p>
    <ul>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
        <li><strong>Login URL:</strong> <a href="{{ $loginUrl }}">{{ $loginUrl }}</a></li>
    </ul>
    <p>We’re excited to have you on board! 😊</p>
</body>
</html>
