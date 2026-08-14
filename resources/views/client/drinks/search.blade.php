@extends('client.layouts.header')

@section('title', 'Gözleg netijeleri')

@section('content')
    <div class="container py-4">
        <div class="mb-4">
            <h2 class="fw-bold text-dark m-0">Gözleg netijeleri</h2>
            <p class="text-muted m-0">
                @if($keyword)
                    "{{ $keyword }}" boýunça jemi: <strong>{{ $drinks->total() }}</strong> haryt tapyldy
                @else
                    Ähli harytlar: <strong>{{ $drinks->total() }}</strong>
                @endif
            </p>
        </div>

        @if($drinks->count() > 0)
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 mb-4">
                @foreach($drinks as $drink)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden text-center p-2 position-relative">

                            {{-- Картинка товара --}}
                            <div class="bg-light rounded-3 overflow-hidden d-flex align-items-center justify-content-center"
                                style="height: 150px;">
                                @if($drink->img)
                                    <img src="{{ asset('storage/' . $drink->img) }}" alt="{{ $drink->name }}"
                                        class="w-100 h-100 object-fit-contain">
                                @else
                                    <i class="bi bi-cup-hot display-5 text-secondary opacity-50"></i>
                                @endif
                            </div>

                            <div class="pt-2 pb-1 d-flex flex-column justify-content-between flex-grow-1 text-start">
                                <div>
                                    @if($drink->cafeteria)
                                        <a href="{{ route('client.cafeterias.show', $drink->cafeteria->id) }}"
                                            class="text-decoration-none text-muted small fw-semibold text-truncate d-block mb-1">
                                            {{ $drink->cafeteria->name }}
                                        </a>
                                    @endif

                                    <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $drink->name }}">
                                        {{ $drink->name }}
                                    </h6>
                                </div>

                                <div>
                                    {{-- Цена --}}
                                    <div class="fw-bold text-success fs-6 mb-2">
                                        {{ number_format($drink->price, 2) }} TMT
                                    </div>

                                    <button
                                        class="btn btn-success btn-sm w-100 rounded-3 d-flex align-items-center justify-content-center gap-1">
                                        <i class="bi bi-cart-plus"></i> Söwda sebedi
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $drinks->links() }}
            </div>
        @else
            <div class="text-center py-5 my-5">
                <i class="bi bi-search display-1 text-muted opacity-25"></i>
                <h4 class="fw-bold mt-3">Haryt tapylmady</h4>
                <p class="text-muted">Başga sözi gözläp görüň</p>
            </div>
        @endif
    </div>
@endsection