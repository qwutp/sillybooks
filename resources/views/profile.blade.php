@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
<style>
    .profile-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 1.5rem 1rem;
    }

    .profile-header {
        margin-bottom: 1.5rem;
    }

    .profile-title {
        font-family: 'Druk Wide Cyr', Arial, sans-serif;
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
    }

    .profile-card {
        background: white;
        border-radius: 0.75rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .profile-info {
            flex-direction: row;
        }
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        background: #f0f0f0;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-details {
        flex: 1;
    }

    .profile-name {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.75rem;
    }

    .profile-data {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    @media (min-width: 768px) {
        .profile-data {
            grid-template-columns: 1fr 1fr;
        }
    }

    .profile-data-item h3 {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .profile-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }

    .btn-primary {
        background-color: #B57219;
        color: white;
    }

    .btn-primary:hover {
        background-color: #9A5F14;
    }

    .btn-outline {
        border: 1px solid #B57219;
        color: #B57219;
        background: transparent;
    }

    .btn-outline:hover {
        background-color: rgba(181, 114, 25, 0.1);
    }

    .btn-danger {
        border: 1px solid #ef4444;
        color: #ef4444;
        background: transparent;
    }

    .btn-danger:hover {
        background-color: rgba(239, 68, 68, 0.1);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        text-align: center;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: bold;
        color: #B57219;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.875rem;
        font-weight: 500;
    }

    .activity-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .activity-header {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .activity-header h2 {
        margin: 0;
        font-size: 1.25rem;
    }

    .activity-item {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-title {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .activity-title span {
        font-weight: 500;
    }

    .activity-title a {
        color: #B57219;
        text-decoration: none;
        margin-left: 0.5rem;
    }

    .activity-title a:hover {
        text-decoration: underline;
    }

    .rating {
        display: flex;
        color: #fbbf24;
        margin-bottom: 0.5rem;
    }

    .activity-content {
        color: #4b5563;
        margin-bottom: 0.5rem;
    }

    .activity-date {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .empty-activity {
        padding: 2rem;
        text-align: center;
        color: #6b7280;
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <h1 class="profile-title">Профиль</h1>
        
        @if (session('success'))
            <div style="background-color: #d1fae5; border: 1px solid #a7f3d0; color: #047857; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                {{ session('success') }}
            </div>
        @endif
    </div>
    
    <div class="profile-card">
        <div class="profile-info">
            <div class="profile-avatar">
                <img src="/images/avatars/{{ $user->avatar }}" alt="{{ $user->name }}">
            </div>
            
            <div class="profile-details">
                <h2 class="profile-name">{{ $user->name }}</h2>
                
                <div class="profile-data">
                    <div class="profile-data-item">
                        <h3>Email</h3>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="profile-data-item">
                        <h3>Дата регистрации</h3>
                        <p>{{ $user->created_at->format('d.m.Y') }}</p>
                    </div>
                </div>
                
                <div class="profile-actions">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Редактировать профиль</a>
                    <a href="{{ route('profile.change-password') }}" class="btn btn-outline">Изменить пароль</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выйти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Reading Statistics -->
    <h2 class="profile-title">Статистика чтения</h2>
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{ $user->userBooks()->where('status', 'completed')->count() }}</div>
            <div class="stat-label">Прочитано книг</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">{{ $user->userBooks()->where('status', 'reading')->count() }}</div>
            <div class="stat-label">Читаю сейчас</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-number">{{ $user->userBooks()->where('status', 'want_to_read')->count() }}</div>
            <div class="stat-label">Хочу прочитать</div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <h2 class="profile-title">Недавняя активность</h2>
    <div class="activity-card">
        @if($user->reviews()->count() > 0)
            @foreach($user->reviews()->latest()->take(5)->get() as $review)
                <div class="activity-item">
                    <div class="activity-title">
                        <span>Отзыв на книгу</span>
                        <a href="{{ route('book.show', $review->book_id) }}">{{ $review->book->title }}</a>
                    </div>
                    <div class="rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>
                    <p class="activity-content">{{ Str::limit($review->content, 150) }}</p>
                    <p class="activity-date">{{ $review->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        @else
            <div class="empty-activity">
                У вас пока нет отзывов на книги.
            </div>
        @endif
    </div>
</div>
@endsection
