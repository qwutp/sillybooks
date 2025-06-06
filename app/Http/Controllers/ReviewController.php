<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        $existingReview = Review::where('user_id', auth()->id())
                               ->where('book_id', $request->book_id)
                               ->first();

        if ($existingReview) {
            return back()->with('error', 'Вы уже оставили отзыв на эту книгу.');
        }

        Review::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Отзыв успешно добавлен!');
    }

    public function update(Request $request, Review $review)
    {

        if ($review->user_id !== auth()->id()) {
            return back()->with('error', 'Вы можете редактировать только свои отзывы.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Отзыв успешно обновлен!');
    }

    public function destroy(Review $review)
    {

        if ($review->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            return back()->with('error', 'У вас нет прав для удаления этого отзыва.');
        }

        $review->delete();

        return back()->with('success', 'Отзыв успешно удален!');
    }

    public function like(Review $review)
    {
        return response()->json(['success' => true]);
    }
}
