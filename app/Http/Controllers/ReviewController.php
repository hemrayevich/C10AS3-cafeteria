<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Ilki ulgama giriň!'
            ], 401);
        }

        $request->validate([
            'drink_id' => 'required|exists:drinks,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Reviews::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'drink_id' => $request->drink_id,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Baha üstünlikli ýatda saklandy!' // Оценка успешно сохранена
        ]);
    }
}
