<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $books = Book::all();

        foreach ($books as $book) {
            $reviewCount = rand(3, 8);
            
            $userIds = $users->random($reviewCount)->pluck('id')->toArray();
            
            foreach ($userIds as $userId) {
                Review::create([
                    'user_id' => $userId,
                    'book_id' => $book->id,
                    'content' => 'Это отличная книга! ' . fake()->paragraph(rand(2, 5)),
                    'rating' => rand(3, 5),
                ]);
            }

            $avgRating = Review::where('book_id', $book->id)->avg('rating');
            $book->update(['average_rating' => $avgRating]);
        }
    }
}
