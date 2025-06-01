<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Gunung;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('gunung', 'user')->latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $gunungs = Gunung::all();
        return view('reviews.create', compact('gunungs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gunung_id' => 'required|exists:gunungs,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'gunung_id' => $request->gunung_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('gunungs.show', $request->gunung_id)
            ->with('success', 'Ulasan berhasil dikirim.');
    }
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus.');
    }
}
