@extends('admin.layouts.app')

@section('title', 'Täze içgi')

@section('content')
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.drinks.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.drinks._form')
            </form>
        </div>
    </div>
@endsection
