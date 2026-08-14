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
                        @include('client.app.drinkCard')
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