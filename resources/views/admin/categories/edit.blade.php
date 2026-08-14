@extends('admin.layouts.app')

@section('title', 'Kategoriýany üýtget')

@section('content')
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 col-lg-7">
            <form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.categories._form')
            </form>
        </div>
    </div>
@endsection
