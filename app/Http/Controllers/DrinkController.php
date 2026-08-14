<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $drinks = Drink::with('cafeteria')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->paginate(24)
            ->withQueryString();

        return view('client.drinks.search', compact('drinks', 'keyword'));
    }
}
