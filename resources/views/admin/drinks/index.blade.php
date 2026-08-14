@extends('admin.layouts.app')

@section('title', 'Içgiler')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.drinks.create') }}" class="btn btn-success rounded-3">
            <i class="bi bi-plus-lg me-1"></i> Täze içgi
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Surat</th>
                        <th>Ady</th>
                        <th>Kofehana</th>
                        <th>Kategoriýa</th>
                        <th>Bahasy</th>
                        <th>Ýagdaý</th>
                        <th class="text-end">Hereket</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($drinks as $drink)
                        <tr>
                            <td>
                                @if ($drink->image)
                                    <img src="{{ asset('storage/' . $drink->image) }}" alt="" class="rounded" style="width:48px;height:48px;object-fit:cover">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td class="fw-medium">{{ $drink->name }}</td>
                            <td>{{ $drink->cafeteria->name ?? '—' }}</td>
                            <td>{{ $drink->category->name ?? '—' }}</td>
                            <td>{{ number_format($drink->price, 2, '.', ' ') }} m.</td>
                            <td>
                                @if ($drink->is_available)
                                    <span class="badge bg-success">Elýeterli</span>
                                @else
                                    <span class="badge bg-secondary">Ýok</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.drinks.edit', $drink) }}" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.drinks.destroy', $drink) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Içgini pozmak isleýärsiňizmi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Içgi ýok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $drinks->links() }}</div>
@endsection
