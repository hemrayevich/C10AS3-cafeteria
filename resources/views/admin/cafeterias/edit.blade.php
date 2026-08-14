@extends('admin.layouts.app')

@section('title', 'Kofehanany üýtget')

@section('content')
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.cafeterias.update', $cafeteria) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.cafeterias._form')
            </form>
        </div>
    </div>
@endsection
