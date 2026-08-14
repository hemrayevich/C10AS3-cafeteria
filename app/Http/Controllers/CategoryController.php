<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::has('drinks')->get();

        return view('client.categories.index', compact('categories'));
    }
}
