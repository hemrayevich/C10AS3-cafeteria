<?php

namespace App\Http\Controllers;

use App\Models\Cafeteria;
use App\Models\Category;
use Illuminate\Http\Request;

class CafeteriaController extends Controller
{

    public function vipCafeterias()
    {
        $vipCafeterias = Cafeteria::where('is_vip', true)->paginate(15);

        return view('client.cafeterias.vipCafeterias', compact('vipCafeterias'));
    }

    public function latestCafeterias()
    {
        $latestCafeterias = Cafeteria::latest()->take(8)->get();

        return view('client.cafeterias.latestCafeterias', compact('latestCafeterias'));
    }

    public function index(Request $request)
    {
        $query = Cafeteria::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $categoryId = $request->category_id;
            $query->whereHas('drinks', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            });
        }

        $cafeterias = $query->paginate(18)->withQueryString();

        return view('client.cafeterias.index', compact('cafeterias'));
    }

    public function show($id)
    {
        $cafeteria = Cafeteria::with('drinks')->findOrFail($id);

        $categories = Category::whereHas('drinks', function ($query) use ($id) {
            $query->where('cafeteria_id', $id);
        })->with([
                    'drinks' => function ($query) use ($id) {
                        $query->where('cafeteria_id', $id);
                    }
                ])->get();


        return view('client.cafeterias.show', compact('cafeteria', 'categories'));
    }
}
