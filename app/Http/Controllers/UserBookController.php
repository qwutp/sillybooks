<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserBookController extends Controller
{
    /**
     * Display a listing of the user's books.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = auth()->id();
        
        $currentlyReading = Book::with('author')
            ->whereHas('userBooks', function($query) use ($userId) {
                $query->where('user_id', $userId)
                      ->where('status', 'reading');
            })
            ->get();
            
        $wantToRead = Book::with('author')
            ->whereHas('userBooks', function($query) use ($userId) {
                $query->where('user_id', $userId)
                      ->where('status', 'want_to_read');
            })
            ->get();
            
        $completed = Book::with('author')
            ->whereHas('userBooks', function($query) use ($userId) {
                $query->where('user_id', $userId)
                      ->where('status', 'completed');
            })
            ->get();
            
        return view('my-books', compact('currentlyReading', 'wantToRead', 'completed'));
    }
    
    /**
     * Update book status for user
     */
    public function updateStatus(Request $request)
    {
        Log::info('UserBook updateStatus called', [
            'request_data' => $request->all(),
            'user_id' => Auth::id()
        ]);
        
        try {
            // Validate request
            $validated = $request->validate([
                'book_id' => 'required|integer|exists:books,id',
                'status' => 'required|string|in:want_to_read,reading,completed'
            ]);
            
            $userId = Auth::id();
            
            // Check if user is authenticated
            if (!$userId) {
                Log::warning('Unauthenticated user trying to update book status');
                return response()->json([
                    'success' => false, 
                    'message' => 'Пользователь не авторизован'
                ], 401);
            }
            
            // Check if book exists
            $book = Book::find($validated['book_id']);
            if (!$book) {
                Log::warning('Book not found', ['book_id' => $validated['book_id']]);
                return response()->json([
                    'success' => false, 
                    'message' => 'Книга не найдена'
                ], 404);
            }
            
            // Update or create user book record
            $userBook = UserBook::updateOrCreate(
                [
                    'user_id' => $userId,
                    'book_id' => $validated['book_id']
                ],
                [
                    'status' => $validated['status'],
                    'progress' => $validated['status'] === 'completed' ? 100 : 0
                ]
            );
            
            Log::info('UserBook status updated successfully', [
                'user_id' => $userId,
                'book_id' => $validated['book_id'],
                'status' => $validated['status'],
                'user_book_id' => $userBook->id
            ]);
            
            return response()->json([
                'success' => true, 
                'message' => 'Статус книги успешно обновлен',
                'status' => $validated['status']
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in updateStatus', [
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);
            
            return response()->json([
                'success' => false, 
                'message' => 'Ошибка валидации данных',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Error updating book status', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
                'user_id' => Auth::id()
            ]);
            
            return response()->json([
                'success' => false, 
                'message' => 'Произошла ошибка при обновлении статуса: ' . $e->getMessage()
            ], 500);
        }
    }
}
