@php($category = $category ?? null)

<div class="mb-3">
    <label class="form-label">Ady</label>
    <input type="text" name="name" value="{{ old('name', $category?->name) }}" class="form-control" required>
</div>
<div class="mb-3">
    <label class="form-label">Ady (EN)</label>
    <input type="text" name="name_en" value="{{ old('name_en', $category?->name_en) }}" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Ady (RU)</label>
    <input type="text" name="name_ru" value="{{ old('name_ru', $category?->name_ru) }}" class="form-control">
</div>
<div class="mb-4">
    <label class="form-label">Surat</label>
    @if (!empty($category?->img))
        <div class="mb-2">
            <img src="{{ asset('storage/' . $category->img) }}" alt="" class="rounded" style="height:80px;object-fit:cover">
        </div>
    @endif
    <input type="file" name="img" class="form-control" accept="image/*">
</div>
<button class="btn btn-success rounded-3">Ýatda sakla</button>
<a href="{{ route('admin.categories.index') }}" class="btn btn-light rounded-3">Yza</a>
