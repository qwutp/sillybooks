<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $query = Author::withCount('books')->latest();
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }
        
        $authors = $query->paginate(10);
        
        return view('admin.authors.index', compact('authors'));
    }
    
    public function create()
    {
        return view('admin.authors.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        $author = new Author();
        $author->name = $validated['name'];
        $author->bio = $validated['bio'] ?? null;
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('authors', 'public');
            $author->image = basename($imagePath);
        }
        
        $author->save();
        
        return redirect()->route('admin.authors.index')
            ->with('success', 'Автор успешно добавлен.');
    }
    
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }
    
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        $author->name = $validated['name'];
        $author->bio = $validated['bio'] ?? null;
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($author->image) {
                Storage::disk('public')->delete('authors/' . $author->image);
            }
            
            $imagePath = $request->file('image')->store('authors', 'public');
            $author->image = basename($imagePath);
        }
        
        $author->save();
        
        return redirect()->route('admin.authors.index')
            ->with('success', 'Автор успешно обновлен.');
    }
    
    public function destroy(Author $author)
    {
        // Delete image if exists
        if ($author->image) {
            Storage::disk('public')->delete('authors/' . $author->image);
        }
        
        $author->delete();
        
        return redirect()->route('admin.authors.index')
            ->with('success', 'Автор успешно удален.');
    }
}
