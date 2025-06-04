<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($id)
    {
        $author = Author::with(['books.genres'])
            ->withCount('books')
            ->findOrFail($id);
            
        return view('author.show', compact('author'));
    }
}
