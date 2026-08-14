@extends('client.layouts.header')

@section('title', 'VIP Kafeterialar')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h2 class="fw-bold text-dark m-0">Täze Kofeteriýalar</h2>
    </div>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        @forelse($latestCafeterias as $cafeteria)
            @include('client.app.cafeCard')
        @empty
            <div class="col-12 py-5 text-center">
                <div class="text-muted">
                    <i class="bi bi-shop display-1 d-block mb-3 opacity-50"></i>
                    <h4>Täze kofeteriýalar tapylmady</h4>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection