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
                                                <div style="width: 48px; height: 64px; background: #f0f0f0; border-radius: 0.25rem; overflow: hidden;">
                                                    @if($book->cover_image && file_exists(public_path('images/books/' . $book->cover_image)))
                                                        <img src="{{ asset('images/books/' . $book->cover_image) }}" 
                                                             alt="{{ $book->title }}" 
                                                             style="width: 100%; height: 100%; object-fit: cover;">
                                                    @else
                                                        <div style="width: 100%; height: 100%; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 0.75rem; text-align: center; padding: 2px;">
                                                            Нет обложки
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <div style="font-weight: 500;">{{ $book->title }}</div>
                                                    @if($book->description)
                                                        <div style="color: #666; font-size: 0.9rem;">{{ Str::limit($book->description, 50) }}</div>
                                                    @endif
                                                </div>
                                            </td>
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
                                                @if($user->avatar && file_exists(public_path('images/avatars/' . $user->avatar)))
                                                    <img src="{{ asset('images/avatars/' . $user->avatar) }}" 
                                                         alt="{{ $user->name }}" 
                                                         width="40" 
                                                         height="40" 
                                                         style="border-radius: 50%; object-fit: cover;">
                                                @else
                                                    <div style="width: 40px; height: 40px; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 12px; border-radius: 50%;">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                @endif
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
