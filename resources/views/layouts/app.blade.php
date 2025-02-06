<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Goods Lending App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
