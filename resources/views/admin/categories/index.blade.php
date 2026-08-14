@extends('admin.layouts.app')

@section('title', 'Kategoriýalar')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success rounded-3">
            <i class="bi bi-plus-lg me-1"></i> Täze kategoriýa
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Surat</th>
                        <th>Ady</th>
                        <th>EN</th>
                        <th>RU</th>
                        <th class="text-end">Hereket</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>
                                @if ($category->img)
                                    <img src="{{ asset('storage/' . $category->img) }}" alt="" class="rounded" style="width:48px;height:48px;object-fit:cover">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td class="fw-medium">{{ $category->name }}</td>
                            <td>{{ $category->name_en ?: '—' }}</td>
                            <td>{{ $category->name_ru ?: '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Kategoriýany pozmak isleýärsiňizmi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Kategoriýa ýok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $categories->links() }}</div>
@endsection
