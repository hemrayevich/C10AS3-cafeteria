@extends('admin.layouts.app')

@section('title', 'Menejerler')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.managers.create') }}" class="btn btn-success rounded-3">
            <i class="bi bi-plus-lg me-1"></i> Täze menejer
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Ady</th>
                        <th>E-poçta</th>
                        <th>Telefon</th>
                        <th>Kofehana</th>
                        <th class="text-end">Hereket</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($managers as $manager)
                        <tr>
                            <td class="fw-medium">{{ $manager->name }}</td>
                            <td>{{ $manager->email }}</td>
                            <td>{{ $manager->phone_number ?: '—' }}</td>
                            <td>{{ $manager->cafeteria->name ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.managers.edit', $manager) }}" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.managers.destroy', $manager) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Menejeri pozmak isleýärsiňizmi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Menejer ýok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $managers->links() }}</div>
@endsection
