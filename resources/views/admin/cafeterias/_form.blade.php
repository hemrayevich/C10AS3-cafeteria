@php($cafeteria = $cafeteria ?? null)

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Ady</label>
        <input type="text" name="name" value="{{ old('name', $cafeteria?->name) }}" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Ady (EN)</label>
        <input type="text" name="name_en" value="{{ old('name_en', $cafeteria?->name_en) }}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Ady (RU)</label>
        <input type="text" name="name_ru" value="{{ old('name_ru', $cafeteria?->name_ru) }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Adres</label>
        <input type="text" name="address" value="{{ old('address', $cafeteria?->address) }}" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Adres (EN)</label>
        <input type="text" name="address_en" value="{{ old('address_en', $cafeteria?->address_en) }}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Adres (RU)</label>
        <input type="text" name="address_ru" value="{{ old('address_ru', $cafeteria?->address_ru) }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Telefon</label>
        <input type="text" name="phone" value="{{ old('phone', $cafeteria?->phone) }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Iş wagty</label>
        <input type="text" name="working_hours" value="{{ old('working_hours', $cafeteria?->working_hours) }}" class="form-control" placeholder="09:00 - 22:00">
    </div>
    <div class="col-12">
        <label class="form-label">Surat</label>
        @if (!empty($cafeteria?->img))
            <div class="mb-2">
                <img src="{{ asset('storage/' . $cafeteria->img) }}" alt="" class="rounded" style="height:80px;object-fit:cover">
            </div>
        @endif
        <input type="file" name="img" class="form-control" accept="image/*">
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_vip" value="1" id="is_vip"
                @checked(old('is_vip', $cafeteria?->is_vip))>
            <label class="form-check-label" for="is_vip">VIP kofehana</label>
        </div>
    </div>
</div>

<div class="mt-4">
    <button class="btn btn-success rounded-3">Ýatda sakla</button>
    @if (Auth::user()->isAdmin())
        <a href="{{ route('admin.cafeterias.index') }}" class="btn btn-light rounded-3">Yza</a>
    @endif
</div>
