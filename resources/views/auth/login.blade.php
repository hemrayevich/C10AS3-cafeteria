<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş | Damja</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">
</head>

<body class="bg-light">
    <div class="min-vh-100 d-flex align-items-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-6 col-lg-4">
                    <div class="text-center mb-4">
                        <a href="{{ route('client.home.index') }}" class="text-decoration-none">
                            <h1 class="fw-bold text-success mb-1">Damja</h1>
                        </a>
                        <p class="text-muted mb-0">Hasabyňyza giriň</p>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger rounded-3">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form action="{{ route('client.login.submit') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-medium">E-poçta</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                        placeholder="email@example.com" required autofocus>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label fw-medium">Açarsöz</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg rounded-3" placeholder="••••••••" required>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Ýatda sakla</label>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg w-100 rounded-3 fw-semibold">
                                    Giriş <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <p class="text-center text-muted mt-4 mb-0">
                        Hasabyňyz ýokmy?
                        <a href="{{ route('client.register') }}" class="text-success fw-semibold text-decoration-none">Hasap döret</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
