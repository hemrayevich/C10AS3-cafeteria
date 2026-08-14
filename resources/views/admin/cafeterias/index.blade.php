@extends('admin.layouts.app')

@section('title', 'Kofehanalar')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.cafeterias.create') }}" class="btn btn-success rounded-3">
            <i class="bi bi-plus-lg me-1"></i> Täze kofehana
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Surat</th>
                        <th>Ady</th>
                        <th>Adres</th>
                        <th>VIP</th>
                        <th class="text-end">Hereket</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cafeterias as $cafeteria)
                        <tr>
                            <td>
                                @if ($cafeteria->img)
                                    <img src="{{ asset('storage/' . $cafeteria->img) }}" alt="" class="rounded" style="width:48px;height:48px;object-fit:cover">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td class="fw-medium">{{ $cafeteria->name }}</td>
                            <td>{{ $cafeteria->address }}</td>
                            <td>
                                @if ($cafeteria->is_vip)
                                    <span class="badge bg-warning text-dark">VIP</span>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.cafeterias.edit', $cafeteria) }}" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.cafeterias.destroy', $cafeteria) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Kofehanany pozmak isleýärsiňizmi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Kofehana ýok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $cafeterias->links() }}</div>
@endsection
