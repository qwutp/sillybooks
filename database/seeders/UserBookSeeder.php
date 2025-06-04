<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Database\Seeder;

class UserBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $books = Book::all();

        foreach ($users as $user) {

            $readingBooks = $books->random(rand(3, 5));
            foreach ($readingBooks as $book) {
                UserBook::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'status' => 'reading',
                    'progress' => rand(10, 90),
                ]);
            }

            $completedBooks = $books->diff($readingBooks)->random(rand(2, 4));
            foreach ($completedBooks as $book) {
                UserBook::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'status' => 'completed',
                    'progress' => 100,
                ]);
            }
            
            $remainingBooks = $books->diff($readingBooks)->diff($completedBooks);
            $wantToReadBooks = $remainingBooks->random(rand(3, 6));
            foreach ($wantToReadBooks as $book) {
                UserBook::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'status' => 'want_to_read',
                    'progress' => 0,
                ]);
            }
        }
    }
}
