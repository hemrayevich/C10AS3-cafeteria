@extends('admin.layouts.app')

@section('title', 'Menejeri üýtget')

@section('content')
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 col-lg-7">
            <form action="{{ route('admin.managers.update', $manager) }}" method="post">
                @csrf
                @method('PUT')
                @include('admin.managers._form')
            </form>
        </div>
    </div>
@endsection
