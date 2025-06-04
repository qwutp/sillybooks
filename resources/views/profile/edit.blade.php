@extends('layouts.app')

@section('title', 'Редактирование профиля')

@section('content')
<style>
.profile-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.profile-header {
    text-align: center;
    margin-bottom: 2rem;
}

.profile-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 0.5rem;
}

.profile-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    margin-bottom: 1.5rem;
}

.avatar-section {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e5e5e5;
}

.avatar-container {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 2rem;
    border: 3px solid #f0f0f0;
}

.avatar-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.avatar-upload {
    flex: 1;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.form-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.2s;
    background: #fafafa;
}

.form-input:focus {
    outline: none;
    border-color: #B57219;
    background: white;
    box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
}

.form-input.error {
    border-color: #ef4444;
    background: #fef2f2;
}

.file-input {
    display: block;
    width: 100%;
    font-size: 0.875rem;
    color: #6b7280;
    background: #f9fafb;
    border: 2px dashed #d1d5db;
    border-radius: 8px;
    padding: 1rem;
    cursor: pointer;
    transition: all 0.2s;
}

.file-input:hover {
    border-color: #B57219;
    background: #fffbeb;
}

.error-message {
    color: #ef4444;
    font-size: 0.75rem;
    margin-top: 0.25rem;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #e5e5e5;
}

.btn {
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
    border: none;
    cursor: pointer;
    font-size: 0.875rem;
}

.btn-primary {
    background: #B57219;
    color: #1a1a1a;
}

.btn-primary:hover {
    background: #B57219;
    transform: translateY(-1px);
}

.btn-secondary {
    color: #6b7280;
    background: transparent;
}

.btn-secondary:hover {
    color: #374151;
}

@media (max-width: 768px) {
    .profile-container {
        padding: 1rem;
    }
    
    .avatar-section {
        flex-direction: column;
        text-align: center;
    }
    
    .avatar-container {
        margin-right: 0;
        margin-bottom: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>

<div class="profile-container">
    <div class="profile-header">
        <h1 class="profile-title">Редактирование профиля</h1>
    </div>
    
    <div class="profile-card">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="avatar-section">
                <div class="avatar-container">
                    <img src="/images/avatars/{{ $user->avatar ?? 'default.jpg' }}" alt="{{ $user->name }}">
                </div>
                
                <div class="avatar-upload">
                    <label for="avatar" class="form-label">Изменить аватар</label>
                    <input type="file" id="avatar" name="avatar" class="file-input" accept="image/*">
                    
                    @error('avatar')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="name" class="form-label">Имя *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="form-input @error('name') error @enderror">
                
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="form-input @error('email') error @enderror">
                
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Сохранить изменения
                </button>
                
                <a href="{{ route('profile') }}" class="btn btn-secondary">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
