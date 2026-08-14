@php($drink = $drink ?? null)

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Ady</label>
        <input type="text" name="name" value="{{ old('name', $drink?->name) }}" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Ady (EN)</label>
        <input type="text" name="name_en" value="{{ old('name_en', $drink?->name_en) }}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Ady (RU)</label>
        <input type="text" name="name_ru" value="{{ old('name_ru', $drink?->name_ru) }}" class="form-control">
    </div>

    @if (Auth::user()->isAdmin())
        <div class="col-md-6">
            <label class="form-label">Kofehana</label>
            <select name="cafeteria_id" class="form-select" required>
                <option value="">Saýlaň</option>
                @foreach ($cafeterias as $cafeteria)
                    <option value="{{ $cafeteria->id }}" @selected(old('cafeteria_id', $drink?->cafeteria_id) == $cafeteria->id)>
                        {{ $cafeteria->name }}
                    </option>
                @endforeach
            </select>
        </div>
    @endif

    <div class="col-md-6">
        <label class="form-label">Kategoriýa</label>
        <select name="category_id" class="form-select" required>
            <option value="">Saýlaň</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $drink?->category_id) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Bahasy</label>
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $drink?->price) }}" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Agram / möçber</label>
        <input type="text" name="weight" value="{{ old('weight', $drink?->weight) }}" class="form-control" placeholder="250 ml">
    </div>
    <div class="col-md-4">
        <label class="form-label">Arzanladyş %</label>
        <input type="number" min="1" max="99" name="discount_percent" value="{{ old('discount_percent', $drink?->discount_percent) }}" class="form-control">
    </div>

    <div class="col-12">
        <label class="form-label">Düşündiriş</label>
        <textarea name="description" rows="2" class="form-control">{{ old('description', $drink?->description) }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Düşündiriş (EN)</label>
        <textarea name="description_en" rows="2" class="form-control">{{ old('description_en', $drink?->description_en) }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Düşündiriş (RU)</label>
        <textarea name="description_ru" rows="2" class="form-control">{{ old('description_ru', $drink?->description_ru) }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-label">Surat</label>
        @if (!empty($drink?->image))
            <div class="mb-2">
                <img src="{{ asset('storage/' . $drink->image) }}" alt="" class="rounded" style="height:80px;object-fit:cover">
            </div>
        @endif
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    <div class="col-12">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="is_available" value="1" id="is_available"
                @checked(old('is_available', $drink?->is_available ?? true))>
            <label class="form-check-label" for="is_available">Elýeterli</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="is_discount" value="1" id="is_discount"
                @checked(old('is_discount', $drink?->is_discount))>
            <label class="form-check-label" for="is_discount">Arzanladyş</label>
        </div>
    </div>
</div>

<div class="mt-4">
    <button class="btn btn-success rounded-3">Ýatda sakla</button>
    <a href="{{ route('admin.drinks.index') }}" class="btn btn-light rounded-3">Yza</a>
</div>
