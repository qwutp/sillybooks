@extends('layouts.app')

@section('title', $author->name)

@section('content')
    <div class="container" style="padding: 2rem 0;">
        <div style="display: flex; gap: 2rem; margin-bottom: 3rem;">
            <div style="flex-shrink: 0;">
                <div style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                    @if($author->image && file_exists(public_path('images/authors/' . $author->image)))
                        <img src="{{ asset('images/authors/' . $author->image) }}" alt="{{ $author->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 100%; background: #B57219; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem; font-weight: bold;">{{ substr($author->name, 0, 1) }}</div>
                    @endif
                </div>
            </div>
            <div style="flex: 1;">
                <h1 style="font-size: 2rem; margin-bottom: 1rem; color: #333;">{{ $author->name }}</h1>
                
                @if($author->birth_date)
                <p style="color: #6b7280; margin-bottom: 1rem;">
                    Дата рождения: {{ \Carbon\Carbon::parse($author->birth_date)->format('d.m.Y') }}
                </p>
                @endif
                
                <div style="margin-bottom: 2rem;">
                    <span style="background: #f3f4f6; color: #374151; padding: 0.5rem 1rem; border-radius: 1rem; font-size: 0.875rem;">
                        {{ $author->books_count }} {{ trans_choice('книга|книги|книг', $author->books_count) }}
                    </span>
                </div>
                
                @if($author->bio)
                <div style="background: #f9fafb; padding: 1.5rem; border-radius: 0.5rem;">
                    <p style="line-height: 1.6; color: #374151;">
                        {{ $author->bio }}
                    </p>
                </div>
                @endif
            </div>
        </div>
        <div>
            <h2 style="font-size: 1.5rem; margin-bottom: 2rem; color: #333;">Книги автора</h2>
            
            @if($author->books->count() > 0)
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 2rem;">
                    @foreach($author->books as $book)
                        <div style="text-align: center;">
                            <a href="{{ route('book.show', $book->id) }}" style="text-decoration: none; color: inherit;">
                                <div style="width: 100%; aspect-ratio: 2/3; border-radius: 0.5rem; overflow: hidden; margin-bottom: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                    @if($book->cover_image && file_exists(public_path('images/books/' . $book->cover_image)))
                                        <img src="{{ asset('images/books/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div style="width: 100%; height: 100%; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af;">Нет обложки</div>
                                    @endif
                                </div>
                                
                                <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; line-height: 1.3;">{{ $book->title }}</h3>
                                
                                @if($book->average_rating > 0)
                                <div style="display: flex; align-items: center; justify-content: center; gap: 0.25rem; color: #6b7280; font-size: 0.875rem;">
                                    <span style="color: #FFD700;">★</span>
                                    <span>{{ number_format($book->average_rating, 1) }}</span>
                                </div>
                                @endif
                                <div style="display: flex; flex-wrap: wrap; gap: 0.25rem; justify-content: center; margin-top: 0.5rem;">
                                    @foreach($book->genres->take(2) as $genre)
                                        <span style="background: #f3f4f6; color: #6b7280; padding: 0.25rem 0.5rem; border-radius: 0.5rem; font-size: 0.75rem;">{{ $genre->name }}</span>
                                    @endforeach
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; padding: 3rem; color: #6b7280;">
                    <p>У этого автора пока нет книг в нашей библиотеке.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
