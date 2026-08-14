<div class="col">
    <a href="{{ route('client.cafeterias.show', ['id' => $cafeteria->id, 'category_id' => request('category_id')]) }}"
        class="text-decoration-none">
        <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm product-card position-relative {{ $cafeteria->is_vip ? 'text-white' : 'text-dark' }}"
            style="background-color: {{ $cafeteria->is_vip ? '#198754' : '#e9ecef' }};">

            @if($cafeteria->is_vip)
                <div class="position-absolute top-0 start-0 m-2 z-2" title="VIP Kofehana">
                    <span class="badge bg-warning text-dark d-flex align-items-center gap-1 shadow-sm px-2 py-1">
                        <i class="bi bi-award-fill"></i> VIP
                    </span>
                </div>
            @elseif(isset($is_new) && $is_new)
                <div class="position-absolute top-0 start-0 m-2 z-2" title="Täze">
                    <span
                        class="badge bg-success text-white d-flex align-items-center justify-content-center p-2 rounded-3 shadow-sm"
                        style="width: 28px; height: 28px;">
                        <i class="bi bi-plus-lg fs-6"></i>
                    </span>
                </div>
            @endif

            <div class="m-2 bg-white rounded-3 overflow-hidden d-flex align-items-center justify-content-center position-relative"
                style="height: 125px;">
                @if($cafeteria->img)
                    <img src="{{ asset('storage/' . $cafeteria->img) }}" alt="{{ $cafeteria->name }}"
                        class="w-100 h-100 object-fit-cover">
                @else
                    <div class="text-center text-muted">
                        <i class="bi bi-shop display-5 text-success"></i>
                    </div>
                @endif
            </div>
            
            <div class="p-3 pt-1 {{ $cafeteria->is_vip ? 'text-white' : 'text-dark' }}">
                <h6 class="fw-bold mb-2 text-truncate" title="{{ $cafeteria->name }}">
                    {{ $cafeteria->name }}
                </h6>

                @if($cafeteria->working_hours)
                    <div class="d-flex align-items-center gap-1 opacity-75 small mb-1" style="font-size: 12px;">
                        <i class="bi bi-clock"></i>
                        <span class="text-truncate">{{ $cafeteria->working_hours }}</span>
                    </div>
                @endif

                @if($cafeteria->address)
                    <div class="d-flex align-items-center gap-1 opacity-75 small" style="font-size: 12px;">
                        <i class="bi bi-geo-alt"></i>
                        <span class="text-truncate">{{ $cafeteria->address }}</span>
                    </div>
                @endif
            </div>

        </div>
    </a>
</div>