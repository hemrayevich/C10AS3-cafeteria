<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafeteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = User::with('cafeteria')
            ->where('role', 'manager')
            ->latest()
            ->paginate(15);

        return view('admin.managers.index', compact('managers'));
    }

    public function create()
    {
        $cafeterias = Cafeteria::orderBy('name')->get();

        return view('admin.managers.create', compact('cafeterias'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['role'] = 'manager';
        $data['password'] = $request->password;

        User::create($data);

        return redirect()->route('admin.managers.index')->with('success', 'Menejer döredildi.');
    }

    public function edit(User $manager)
    {
        abort_unless($manager->isManager(), 404);

        $cafeterias = Cafeteria::orderBy('name')->get();

        return view('admin.managers.edit', compact('manager', 'cafeterias'));
    }

    public function update(Request $request, User $manager)
    {
        abort_unless($manager->isManager(), 404);

        $data = $this->validated($request, $manager);

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        } else {
            unset($data['password']);
        }

        $manager->update($data);

        return redirect()->route('admin.managers.index')->with('success', 'Menejer täzelendi.');
    }

    public function destroy(User $manager)
    {
        abort_unless($manager->isManager(), 404);

        if ($manager->id === Auth::id()) {
            return back()->withErrors(['delete' => 'Öz hasabyňyzy pozup bolmaýar.']);
        }

        $manager->delete();

        return redirect()->route('admin.managers.index')->with('success', 'Menejer pozuldy.');
    }

    protected function validated(Request $request, ?User $manager = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($manager?->id)],
            'phone_number' => 'nullable|string|max:30',
            'cafeteria_id' => 'required|exists:cafeterias,id',
            'password' => [$manager ? 'nullable' : 'required', 'string', 'min:6', 'confirmed'],
        ]);
    }
}
