<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use HandlesUploads;

    public function index()
    {
        $categories = Category::latest()->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['img'] = $this->upload($request->file('img'), 'categories');

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategoriýa döredildi.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $this->validated($request);
        $data['img'] = $this->upload($request->file('img'), 'categories', $category->img);

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategoriýa täzelendi.');
    }

    public function destroy(Category $category)
    {
        $this->deleteFile($category->img);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategoriýa pozuldy.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'img' => 'nullable|image|max:2048',
        ]);
    }
}
