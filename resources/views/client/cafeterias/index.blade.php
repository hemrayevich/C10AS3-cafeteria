@extends('client.layouts.header')

@section('title', 'Ähli Restoranlar')

@section('content')
<div class="container-lg py-4">
    <h2 class="fw-bold text-dark mb-4">Ähli Kafeteriýalar</h2>

    <form action="{{ route('client.cafeterias.index') }}" method="GET" class="mb-4">
        @csrf
        <div class="position-relative" style="max-width: 450px;">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary fs-5"></i>
            <input type="text" 
                   name="search" 
                   class="form-control form-control-lg ps-5 bg-white border-0 shadow-sm rounded-3 fs-6" 
                   placeholder="Gözleg..." 
                   value="{{ request('search') }}"
                   onchange="this.form.submit()">
        </div>
    </form>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 mb-4">
        @forelse($cafeterias as $cafeteria)
            @include('client.app.cafeCard')
        @empty
            <div class="col-12 w-100 text-center py-5">
                <i class="bi bi-search display-1 text-muted opacity-50 d-block mb-3"></i>
                <h4 class="fw-bold text-secondary">Hiç hili kafteriýa tapylmady</h4>
                <p class="text-muted">Başga gözleg sözüni girizip görüň.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $cafeterias->links() }}
    </div>
</div>
@endsection