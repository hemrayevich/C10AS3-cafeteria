<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafeteria;
use App\Models\Category;
use App\Models\Drink;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isManager()) {
            $cafeteriaId = $user->cafeteria_id;

            $stats = [
                'drinks' => Drink::where('cafeteria_id', $cafeteriaId)->count(),
                'available' => Drink::where('cafeteria_id', $cafeteriaId)->where('is_available', true)->count(),
            ];

            $cafeteria = $user->cafeteria;

            return view('admin.dashboard', compact('stats', 'cafeteria'));
        }

        $stats = [
            'cafeterias' => Cafeteria::count(),
            'drinks' => Drink::count(),
            'categories' => Category::count(),
            'managers' => User::where('role', 'manager')->count(),
            'users' => User::where('role', 'user')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
