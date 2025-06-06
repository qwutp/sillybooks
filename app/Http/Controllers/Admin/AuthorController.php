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
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Создаем папку если её нет
            if (!file_exists(public_path('images/authors'))) {
                mkdir(public_path('images/authors'), 0755, true);
            }
            
            $image->move(public_path('images/authors'), $imageName);
            $author->image = $imageName;
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

            if ($author->image && file_exists(public_path('images/authors/' . $author->image))) {
                unlink(public_path('images/authors/' . $author->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            if (!file_exists(public_path('images/authors'))) {
                mkdir(public_path('images/authors'), 0755, true);
            }
            
            $image->move(public_path('images/authors'), $imageName);
            $author->image = $imageName;
        }
        
        $author->save();
        
        return redirect()->route('admin.authors.index')
            ->with('success', 'Автор успешно обновлен.');
    }
    
    public function destroy(Author $author)
    {

        if ($author->image && file_exists(public_path('images/authors/' . $author->image))) {
            unlink(public_path('images/authors/' . $author->image));
        }
        
        $author->delete();
        
        return redirect()->route('admin.authors.index')
            ->with('success', 'Автор успешно удален.');
    }
}
