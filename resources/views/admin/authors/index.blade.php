@extends('layouts.admin')

@section('title', 'Управление авторами')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h2 style="margin: 0;">Список авторов</h2>
    <a href="{{ route('admin.authors.create') }}" class="btn btn-primary btn-sm">
        Добавить автора
    </a>
</div>
<div class="card" style="margin-bottom: 2rem;">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.authors.index') }}" style="display: flex; gap: 1rem; align-items: center;">
            <div style="flex: 1;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Поиск по имени автора..." class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Поиск</button>
            @if(request('search'))
                <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary btn-sm">Сбросить</a>
            @endif
        </form>
    </div>
</div>
<div class="card">
    @if($authors->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Автор</th>
                    <th>Книги</th>
                    <th>Дата рождения</th>
                    <th>Дата добавления</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <div style="width: 48px; height: 48px; margin-right: 1rem; background: #f0f0f0; border-radius: 50%; overflow: hidden;">
                                @if($author->image && file_exists(public_path('images/authors/' . $author->image)))
                                    <img src="{{ asset('images/authors/' . $author->image) }}" alt="{{ $author->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div style="width: 100%; height: 100%; background: #B57219; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">{{ substr($author->name, 0, 1) }}</div>
                                @endif
                            </div>
                            <div>
                                <div style="font-weight: 500;">{{ $author->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $author->books_count ?? $author->books->count() }}</td>
                    <td>{{ $author->birth_date ? $author->birth_date->format('d.m.Y') : 'Не указана' }}</td>
                    <td>{{ $author->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('admin.authors.edit', $author) }}" style="color: #B57219; text-decoration: none;">Редактировать</a>
                            <form action="{{ route('admin.authors.destroy', $author) }}" method="POST" style="display: inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этого автора?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; text-decoration: underline;">Удалить</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($authors->hasPages())
            <div style="padding: 1.5rem; border-top: 1px solid #ddd;">
                {{ $authors->links() }}
            </div>
        @endif
    @else
        <div style="padding: 2rem; text-align: center;">
            <p style="color: #666;">Авторы не найдены.</p>
            <a href="{{ route('admin.authors.create') }}" class="btn btn-primary btn-sm" style="margin-top: 1rem;">
                Добавить первого автора
            </a>
        </div>
    @endif
</div>
@endsection
