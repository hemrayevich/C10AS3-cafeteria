<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Cafeteria;
use App\Models\Category;
use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrinkController extends Controller
{
    use HandlesUploads;

    public function index()
    {
        $query = Drink::with(['cafeteria', 'category'])->latest();

        if (Auth::user()->isManager()) {
            $query->where('cafeteria_id', Auth::user()->cafeteria_id);
        }

        $drinks = $query->paginate(15);

        return view('admin.drinks.index', compact('drinks'));
    }

    public function create()
    {
        return view('admin.drinks.create', $this->formData());
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['cafeteria_id'] = $this->resolveCafeteriaId($request);
        $data['is_available'] = $request->boolean('is_available', true);
        $data['is_discount'] = $request->boolean('is_discount');
        $data['image'] = $this->upload($request->file('image'), 'drinks');

        Drink::create($data);

        return redirect()->route('admin.drinks.index')->with('success', 'Içgi döredildi.');
    }

    public function edit(Drink $drink)
    {
        $this->authorizeDrink($drink);

        return view('admin.drinks.edit', array_merge(compact('drink'), $this->formData()));
    }

    public function update(Request $request, Drink $drink)
    {
        $this->authorizeDrink($drink);

        $data = $this->validated($request);
        $data['cafeteria_id'] = $this->resolveCafeteriaId($request, $drink);
        $data['is_available'] = $request->boolean('is_available');
        $data['is_discount'] = $request->boolean('is_discount');
        $data['image'] = $this->upload($request->file('image'), 'drinks', $drink->image);

        $drink->update($data);

        return redirect()->route('admin.drinks.index')->with('success', 'Içgi täzelendi.');
    }

    public function destroy(Drink $drink)
    {
        $this->authorizeDrink($drink);
        $this->deleteFile($drink->image);
        $drink->delete();

        return redirect()->route('admin.drinks.index')->with('success', 'Içgi pozuldy.');
    }

    protected function formData(): array
    {
        $categories = Category::orderBy('name')->get();
        $cafeterias = Auth::user()->isAdmin()
            ? Cafeteria::orderBy('name')->get()
            : collect();

        return compact('categories', 'cafeterias');
    }

    protected function validated(Request $request): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'weight' => 'nullable|string|max:50',
            'discount_percent' => 'nullable|integer|min:1|max:99',
            'image' => 'nullable|image|max:2048',
        ];

        if (Auth::user()->isAdmin()) {
            $rules['cafeteria_id'] = 'required|exists:cafeterias,id';
        }

        return $request->validate($rules);
    }

    protected function resolveCafeteriaId(Request $request, ?Drink $drink = null): int
    {
        $user = Auth::user();

        if ($user->isManager()) {
            abort_unless($user->cafeteria_id, 403, 'Menejere kofehana baglanmadyk.');

            return $user->cafeteria_id;
        }

        return (int) $request->input('cafeteria_id', $drink?->cafeteria_id);
    }

    protected function authorizeDrink(Drink $drink): void
    {
        $user = Auth::user();

        if ($user->isManager() && $drink->cafeteria_id !== $user->cafeteria_id) {
            abort(403);
        }
    }
}
