<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Cafeteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CafeteriaController extends Controller
{
    use HandlesUploads;

    public function index()
    {
        $cafeterias = Cafeteria::latest()->paginate(15);

        return view('admin.cafeterias.index', compact('cafeterias'));
    }

    public function create()
    {
        return view('admin.cafeterias.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['is_vip'] = $request->boolean('is_vip');
        $data['img'] = $this->upload($request->file('img'), 'cafeterias');

        Cafeteria::create($data);

        return redirect()->route('admin.cafeterias.index')->with('success', 'Kofehana döredildi.');
    }

    public function edit(Cafeteria $cafeteria)
    {
        $this->authorizeCafeteria($cafeteria);

        return view('admin.cafeterias.edit', compact('cafeteria'));
    }

    public function update(Request $request, Cafeteria $cafeteria)
    {
        $this->authorizeCafeteria($cafeteria);

        $data = $this->validated($request);
        $data['is_vip'] = $request->boolean('is_vip');
        $data['img'] = $this->upload($request->file('img'), 'cafeterias', $cafeteria->img);

        $cafeteria->update($data);

        if (Auth::user()->isManager()) {
            return redirect()->route('admin.cafeterias.edit', $cafeteria)->with('success', 'Kofehana täzelendi.');
        }

        return redirect()->route('admin.cafeterias.index')->with('success', 'Kofehana täzelendi.');
    }

    public function destroy(Cafeteria $cafeteria)
    {
        $this->deleteFile($cafeteria->img);
        $cafeteria->delete();

        return redirect()->route('admin.cafeterias.index')->with('success', 'Kofehana pozuldy.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'address_en' => 'nullable|string|max:255',
            'address_ru' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'working_hours' => 'nullable|string|max:100',
            'img' => 'nullable|image|max:2048',
        ]);
    }

    protected function authorizeCafeteria(Cafeteria $cafeteria): void
    {
        $user = Auth::user();

        if ($user->isManager() && $user->cafeteria_id !== $cafeteria->id) {
            abort(403);
        }
    }
}
