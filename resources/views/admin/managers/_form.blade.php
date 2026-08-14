@php($manager = $manager ?? null)

<div class="mb-3">
    <label class="form-label">Ady</label>
    <input type="text" name="name" value="{{ old('name', $manager?->name) }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">E-poçta</label>
    <input type="email" name="email" value="{{ old('email', $manager?->email) }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Telefon</label>
    <input type="text" name="phone_number" value="{{ old('phone_number', $manager?->phone_number) }}" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Kofehana</label>
    <select name="cafeteria_id" class="form-select" required>
        <option value="">Saýlaň</option>
        @foreach ($cafeterias as $cafeteria)
            <option value="{{ $cafeteria->id }}" @selected(old('cafeteria_id', $manager?->cafeteria_id) == $cafeteria->id)>
                {{ $cafeteria->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Açarsöz @if(isset($manager))<span class="text-muted">(boş goýsaňyz üýtgemez)</span>@endif</label>
    <input type="password" name="password" class="form-control" @unless(isset($manager)) required @endunless>
</div>

<div class="mb-4">
    <label class="form-label">Açarsözi tassyklamak</label>
    <input type="password" name="password_confirmation" class="form-control">
</div>

<button class="btn btn-success rounded-3">Ýatda sakla</button>
<a href="{{ route('admin.managers.index') }}" class="btn btn-light rounded-3">Yza</a>
