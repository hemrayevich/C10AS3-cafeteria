<?php

namespace App\Http\Controllers;

use App\Models\Cafeteria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vipCafeterias = Cafeteria::where('is_vip', true)->take(6)->get();

        $latestCafeterias = Cafeteria::latest()->take(6)->get();

        $allCafeterias = Cafeteria::inRandomOrder()->take(25)->get();

        return view('client.home.index', compact('vipCafeterias', 'latestCafeterias', 'allCafeterias'));
    }
    
    
}
