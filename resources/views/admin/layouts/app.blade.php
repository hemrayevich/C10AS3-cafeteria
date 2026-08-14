<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel') | Damja</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">
    <style>
        body { background: #f4f6f8; }
        .admin-sidebar { width: 250px; min-height: 100vh; background: #146c43; }
        .admin-sidebar a { color: rgba(255,255,255,.85); }
        .admin-sidebar a:hover,
        .admin-sidebar a.active { background: rgba(255,255,255,.12); color: #fff; }
        .admin-main { min-height: 100vh; }
        @media (max-width: 991px) {
            .admin-sidebar { width: 100%; min-height: auto; }
        }
    </style>
</head>

<body>
    <div class="d-lg-flex">
        <aside class="admin-sidebar p-3 flex-shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 text-white text-decoration-none mb-4 px-2">
                <i class="bi bi-cup-hot-fill fs-4"></i>
                <span class="fw-bold fs-4">Damja</span>
            </a>

            <nav class="d-flex flex-column gap-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 text-decoration-none {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Panel
                </a>

                <a href="{{ route('admin.drinks.index') }}"
                    class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 text-decoration-none {{ request()->routeIs('admin.drinks.*') ? 'active' : '' }}">
                    <i class="bi bi-cup-straw"></i> Içgiler
                </a>

                @if (Auth::user()->isAdmin())
                    <a href="{{ route('admin.categories.index') }}"
                        class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 text-decoration-none {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-grid"></i> Kategoriýalar
                    </a>
                    <a href="{{ route('admin.cafeterias.index') }}"
                        class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 text-decoration-none {{ request()->routeIs('admin.cafeterias.*') ? 'active' : '' }}">
                        <i class="bi bi-shop"></i> Kofehanalar
                    </a>
                    <a href="{{ route('admin.managers.index') }}"
                        class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 text-decoration-none {{ request()->routeIs('admin.managers.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> Menejerler
                    </a>
                @endif

                @if (Auth::user()->isManager() && Auth::user()->cafeteria_id)
                    <a href="{{ route('admin.cafeterias.edit', Auth::user()->cafeteria_id) }}"
                        class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 text-decoration-none {{ request()->routeIs('admin.cafeterias.edit') ? 'active' : '' }}">
                        <i class="bi bi-shop"></i> Meniň kofehanam
                    </a>
                @endif
            </nav>

            <hr class="border-light opacity-25 my-4">

            <a href="{{ route('client.home.index') }}" class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 text-decoration-none">
                <i class="bi bi-globe"></i> Saýta git
            </a>
            <form action="{{ route('client.logout') }}" method="post" class="mt-1">
                @csrf
                <button type="submit" class="btn btn-link text-white text-decoration-none px-3 py-2 w-100 text-start">
                    <i class="bi bi-box-arrow-right me-2"></i>Çykyş
                </button>
            </form>
        </aside>

        <main class="admin-main flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4 fw-bold mb-0">@yield('title')</h1>
                <span class="text-muted small">{{ Auth::user()->name }}</span>
            </div>

            @if (session('success'))
                <div class="alert alert-success rounded-3">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
