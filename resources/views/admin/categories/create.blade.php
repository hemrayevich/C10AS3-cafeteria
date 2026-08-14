@extends('admin.layouts.app')

@section('title', 'Täze kategoriýa')

@section('content')
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 col-lg-7">
            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.categories._form')
            </form>
        </div>
    </div>
@endsection
