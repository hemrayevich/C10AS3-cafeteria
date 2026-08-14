<header class="bg-white border-bottom sticky-top py-2">
    <div class="container-xxl px-lg-5">
        <div class="d-flex align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('client.categories.index') }}"
                    class="btn btn-light d-none d-md-flex align-items-center gap-2 text-dark fw-medium px-3 py-2 border-0 rounded-3 text-decoration-none">
                    <i class="bi bi-grid-3x3-gap text-success fs-5"></i>
                    <span>Kategoryýalar</span>
                </a>

                <a href="{{ route('client.cafeterias.index') }}"
                    class="btn btn-light d-none d-md-flex align-items-center gap-2 text-dark fw-medium px-3 py-2 border-0 rounded-3 text-decoration-none">
                    <i class="bi bi-shop text-success fs-5"></i>
                    <span>Kofehanalar</span>
                </a>
            </div>

            <div class="flex-grow-1 mx-2" style="max-width: 600px;">
                <form action="{{ route('client.drinks.search') }}" method="GET">
                    @csrf
                    <div class="position-relative">
                        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Haryt gözleg..."
                            class="form-control rounded-pill ps-4 pe-5" onchange="this.form.submit()">
                        <button type="submit" class="btn position-absolute end-0 top-0 text-muted me-2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center gap-3">

                <div class="dropdown">
                    <button class="btn btn-link text-secondary p-1 border-0" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-globe fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li><a class="dropdown-item fw-medium text-sm" href="#">🇹🇲 Türkmen dili</a></li>
                        <li><a class="dropdown-item text-sm" href="#">🇷🇺 Русский</a></li>
                        <li><a class="dropdown-item text-sm" href="#">en English</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-link text-dark text-decoration-none p-0 d-flex align-items-center gap-2 fw-medium border-0"
                        type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person fs-5"></i>
                        <span class="d-none d-lg-inline">{{ Auth::check() ? Auth::user()->name : 'Hasabym' }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        @auth
                            @if (Auth::user()->isStaff())
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2 me-2 text-success"></i>Admin panel
                                    </a>
                                </li>
                            @endif
                            <li>
                                <form action="{{ route('client.logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Çykyş
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('client.login') }}">
                                    <i class="bi bi-box-arrow-in-right me-2 text-success"></i>Giriş
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('client.register') }}">
                                    <i class="bi bi-person-plus me-2 text-success"></i>Hasap döret
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>

                <a href="#" class="text-secondary p-1 text-decoration-none">
                    <i class="bi bi-heart fs-5"></i>
                </a>

                <a href="#" class="text-secondary p-1 text-decoration-none position-relative">
                    <i class="bi bi-bag fs-5"></i>
                </a>

            </div>

        </div>
    </div>
</header>