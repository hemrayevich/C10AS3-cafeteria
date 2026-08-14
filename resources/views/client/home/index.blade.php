@extends('client.layouts.header')

@section('title', 'Damja Koffe')

@section('content')

  <div class="container-lg py-5">
    <div>
      <a href="{{ route('client.cafeterias.vipCafeterias') }}"
        class="d-flex align-items-center gap-2 mb-4 h2 text-decoration-none">
        <div class="fw-bold m-0">VIP Kafeterialar</div>
        <div class="text-success fs-5"><i class="bi bi-arrow-right-short"></i></div>
      </a>

      <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        @forelse($vipCafeterias as $cafeteria)
          @include('client.app.cafeCard')
        @empty
          <div class="col-12 text-center py-4 text-muted">
            <p>Häzirki wagtda VIP kafeteria tapylmady.</p>
          </div>
        @endforelse
      </div>
    </div>

    <div class="mt-5">
      <a href="{{ route('client.cafeterias.latestCafeterias') }}"
        class="d-flex align-items-center gap-2 mb-4 h2 text-decoration-none">
        <div class="fw-bold m-0">Taze Kafeterialar</div>
        <div class="text-success fs-5"><i class="bi bi-arrow-right-short"></i></div>
      </a>

      <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        @forelse($latestCafeterias as $cafeteria)
          @include('client.app.cafeCard')
        @empty
          <div class="col-12 text-center py-4 text-muted">
            <p>Häzirki wagtda taze kofeteria tapylmady.</p>
          </div>
        @endforelse
      </div>
    </div>

    <div class="mt-5">
      <a href="{{ route('client.cafeterias.index') }}"
        class="d-flex align-items-center gap-2 mb-4 h2 text-decoration-none">
        <div class="fw-bold m-0">Hemme Kafeterialar</div>
        <div class="text-success fs-5"><i class="bi bi-arrow-right-short"></i></div>
      </a>

      <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        @forelse($allCafeterias as $cafeteria)
          @include('client.app.cafeCard')
        @empty
          <div class="col-12 text-center py-4 text-muted">
            <p>Häzirki wagtda kafeteria tapylmady.</p>
          </div>
        @endforelse
      </div>
    </div>

  </div>

@endsection