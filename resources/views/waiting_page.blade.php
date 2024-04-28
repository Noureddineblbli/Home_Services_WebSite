<!-- resources/views/waiting_page.blade.php -->
<html>
<head>
    <title>Waiting Page</title>
</head>
<body>
    <h1>Please Wait</h1>
    <p>You need to wait until the admin verifies your account.</p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf <!-- CSRF protection token -->
    <button type="submit">Return to home page</button>
</form>
</body>
</html>
