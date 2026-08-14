<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasap döret | Damja</title>
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
                        <p class="text-muted mb-0">Täze hasap dörediň</p>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger rounded-3">
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('client.register.submit') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium">Adyňyz</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                                        placeholder="Adyňyz" required autofocus>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-medium">E-poçta</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
                                        placeholder="email@example.com" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone_number" class="form-label fw-medium">Telefon <span class="text-muted fw-normal">(islege görä)</span></label>
                                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                                        class="form-control form-control-lg rounded-3" placeholder="+993 6x xx-xx-xx">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label fw-medium">Açarsöz</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror"
                                        placeholder="Iň azyndan 6 simwol" required>
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-medium">Açarsözi tassyklamak</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-lg rounded-3" placeholder="Açarsözi gaýtalaň" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg w-100 rounded-3 fw-semibold">
                                    Hasap döret <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <p class="text-center text-muted mt-4 mb-0">
                        Hasabyňyz barmy?
                        <a href="{{ route('client.login') }}" class="text-success fw-semibold text-decoration-none">Giriş</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
