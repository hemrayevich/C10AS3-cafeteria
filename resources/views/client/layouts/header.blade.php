<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') Meshur</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .product-card {
            transition: transform 0.15s ease, shadow 0.15s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08) !important;
        }

        .hover-bg:hover {
            background-color: #e9ecef !important;
            color: #000 !important;
        }
    </style>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body class="bg-light">

    @include('client.app.navbar')

    <div class="container-xxl min-vh-100">
        @yield('content')
    </div>

    @include('client.app.footer')
</body>

</html>