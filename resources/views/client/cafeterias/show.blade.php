@extends('client.layouts.header')

@section('title', $cafeteria->name)

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4" style="background-color: #198754;">
            <div class="card-body p-4 text-white">
                <div class="row align-items-center g-4">
                    <div class="col-12 col-md-auto text-center">
                        <div class="bg-white rounded-4 p-2 overflow-hidden d-flex align-items-center justify-content-center mx-auto"
                            style="width: 140px; height: 140px;">
                            @if($cafeteria->img)
                                <img src="{{ asset('storage/' . $cafeteria->img) }}" alt="{{ $cafeteria->name }}"
                                    class="w-100 h-100 object-fit-cover rounded-3">
                            @else
                                <i class="bi bi-shop display-3 text-success"></i>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md">
                        <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                            <h1 class="fw-bold m-0">{{ $cafeteria->name }}</h1>
                            @if($cafeteria->is_vip)
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm">
                                    <i class="bi bi-award-fill me-1"></i> VIP
                                </span>
                            @endif
                        </div>

                        <div class="d-flex flex-column gap-2 opacity-90 mt-3" style="font-size: 0.95rem;">
                            @if($cafeteria->address)
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-geo-alt-fill text-warning fs-5"></i>
                                    <span>{{ $cafeteria->address }}</span>
                                </div>
                            @endif

                            @if($cafeteria->working_hours)
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-clock-fill text-warning fs-5"></i>
                                    <span>{{ $cafeteria->working_hours }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($categories) && $categories->count() > 0)
            <div class="sticky-top bg-white py-2 mb-4 shadow-sm rounded-4 px-3" style="top: 15px; z-index: 1020;">
                <div class="d-flex align-items-center gap-2 overflow-auto" id="category-nav"
                    style="white-space: nowrap; scrollbar-width: none;">
                    @foreach($categories as $key => $category)
                        <a href="#category-{{ $category->id }}"
                            class="btn btn-category btn-sm rounded-pill px-3 py-2 fw-semibold text-decoration-none {{ $key === 0 ? 'btn-success text-white' : 'btn-outline-success' }}"
                            data-category-id="{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if(isset($categories) && $categories->count() > 0)
            @foreach($categories as $category)
                <div class="category-section mb-5" id="category-{{ $category->id }}" style="scroll-margin-top: 80px;">
                    <h3 class="fw-bold text-dark mb-3">{{ $category->name }}</h3>

                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
                        @foreach($category->drinks as $drink)
                            <div class="col">
                                @include('client.app.drinkCard')
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('.category-section');
            const navButtons = document.querySelectorAll('#category-nav .btn-category');

            function setActiveButton(targetId) {
                navButtons.forEach(btn => {
                    if (btn.getAttribute('href') === '#' + targetId) {
                        btn.classList.remove('btn-outline-success');
                        btn.classList.add('btn-success', 'text-white');
                        btn.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                    } else {
                        btn.classList.remove('btn-success', 'text-white');
                        btn.classList.add('btn-outline-success');
                    }
                });
            }

            const urlParams = new URLSearchParams(window.location.search);
            const targetCategoryId = urlParams.get('category_id');

            if (targetCategoryId) {
                const targetElement = document.getElementById('category-' + targetCategoryId);
                if (targetElement) {
                    setTimeout(() => {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                        setActiveButton('category-' + targetCategoryId);
                    }, 300);
                }
            }

            // 2. Логика скролла
            window.addEventListener('scroll', function () {
                let currentSectionId = '';
                const isAtBottom = (window.innerHeight + window.scrollY) >= document.body.offsetHeight - 50;

                if (isAtBottom && sections.length > 0) {
                    currentSectionId = sections[sections.length - 1].getAttribute('id');
                } else {
                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 130;
                        if (window.scrollY >= sectionTop) {
                            currentSectionId = section.getAttribute('id');
                        }
                    });
                }

                if (currentSectionId) {
                    setActiveButton(currentSectionId);
                }
            });
        });
    </script>
@endsection