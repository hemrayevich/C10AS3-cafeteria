@extends('client.layouts.header')

@section('title', 'Kategoriýalar')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold text-dark mb-4">Kategoriýalar</h2>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
            @foreach($categories as $category)
                <div class="col">
                    <a href="{{ route('client.cafeterias.index', ['category_id' => $category->id]) }}"
                        class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden text-center p-2 card-hover">
                            <div class="bg-light rounded-3 overflow-hidden d-flex align-items-center justify-content-center"
                                style="height: 130px;">
                                @if($category->img)
                                    <img src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->name }}"
                                        class="w-100 h-100 object-fit-cover">
                                @else
                                    <i class="bi bi-grid-fill display-4 text-success opacity-50"></i>
                                @endif
                            </div>
                            <div class="p-2">
                                <h6 class="fw-bold text-dark m-0 text-truncate" title="{{ $category->name }}">
                                    {{ $category->name }}
                                </h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection