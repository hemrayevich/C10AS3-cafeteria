@extends('admin.layouts.app')

@section('title', 'Dolandyryş paneli')

@section('content')
    @if (Auth::user()->isManager())
        <p class="text-muted mb-4">{{ $cafeteria->name ?? 'Kofehana baglanmadyk' }}</p>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="text-muted small">Içgiler</div>
                        <div class="fs-2 fw-bold">{{ $stats['drinks'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="text-muted small">Elýeterli</div>
                        <div class="fs-2 fw-bold">{{ $stats['available'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row g-3">
            <div class="col-md-4 col-xl">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="text-muted small">Kofehanalar</div>
                        <div class="fs-2 fw-bold">{{ $stats['cafeterias'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="text-muted small">Içgiler</div>
                        <div class="fs-2 fw-bold">{{ $stats['drinks'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="text-muted small">Kategoriýalar</div>
                        <div class="fs-2 fw-bold">{{ $stats['categories'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="text-muted small">Menejerler</div>
                        <div class="fs-2 fw-bold">{{ $stats['managers'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="text-muted small">Ulanyjylar</div>
                        <div class="fs-2 fw-bold">{{ $stats['users'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
