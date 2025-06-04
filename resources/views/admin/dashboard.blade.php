@extends('layouts.admin')

@section('title', 'Панель управления')

@section('content')
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{ $stats['books'] }}</div>
            <div class="stat-label">Книг</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">{{ $stats['authors'] }}</div>
            <div class="stat-label">Авторов</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">{{ $stats['users'] }}</div>
            <div class="stat-label">Пользователей</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">{{ $stats['reviews'] }}</div>
            <div class="stat-label">Отзывов</div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Последние добавленные книги</h3>
                </div>
                <div class="card-body">
                    @if($latestBooks->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Обложка</th>
                                        <th>Название</th>
                                        <th>Автор</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latestBooks as $book)
                                        <tr>
                                            <td>
                                                <img src="/images/books/{{ $book->cover ?? 'default.jpg' }}" alt="{{ $book->title }}" width="40">
                                            </td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">Книги не найдены.</p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Новые пользователи</h3>
                </div>
                <div class="card-body">
                    @if($latestUsers->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Аватар</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Дата регистрации</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latestUsers as $user)
                                        <tr>
                                            <td>
                                                <img src="/images/avatars/{{ $user->avatar ?? 'default.jpg' }}" alt="{{ $user->name }}" width="40" height="40" style="border-radius: 50%; object-fit: cover;">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('d.m.Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">Пользователи не найдены.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
