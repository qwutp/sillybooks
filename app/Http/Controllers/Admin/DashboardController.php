<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = [
            'books' => Book::count(),
            'authors' => Author::count(),
            'users' => User::count(),
            'reviews' => Review::count(),
        ];
        
        $latestBooks = Book::with('author')->latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'latestBooks', 'latestUsers'));
    }
}
