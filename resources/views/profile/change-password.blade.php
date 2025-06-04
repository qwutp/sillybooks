@extends('layouts.app')

@section('title', 'Изменение пароля')

@section('content')
<style>
.profile-container {
    max-width: 600px;
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
    border-color: #f59e0b;
    background: white;
    box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
}

.form-input.error {
    border-color: #ef4444;
    background: #fef2f2;
}

.error-message {
    color: #ef4444;
    font-size: 0.75rem;
    margin-top: 0.25rem;
}

.password-hint {
    font-size: 0.75rem;
    color: #6b7280;
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
    background: #f59e0b;
    color: #1a1a1a;
}

.btn-primary:hover {
    background: #d97706;
    transform: translateY(-1px);
}

.btn-secondary {
    color: #6b7280;
    background: transparent;
}

.btn-secondary:hover {
    color: #374151;
}

.security-info {
    background: #f0f9ff;
    border: 1px solid #bae6fd;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 2rem;
}

.security-info h3 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #0369a1;
    margin-bottom: 0.5rem;
}

.security-info p {
    font-size: 0.75rem;
    color: #0369a1;
    margin: 0;
}

@media (max-width: 768px) {
    .profile-container {
        padding: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>

<div class="profile-container">
    <div class="profile-header">
        <h1 class="profile-title">Изменение пароля</h1>
    </div>
    
    <div class="profile-card">
        <div class="security-info">
            <h3>Безопасность</h3>
            <p>Используйте надежный пароль длиной не менее 8 символов, включающий буквы, цифры и специальные символы.</p>
        </div>
        
        <form method="POST" action="{{ route('profile.update-password') }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="current_password" class="form-label">Текущий пароль *</label>
                <input type="password" id="current_password" name="current_password" required
                    class="form-input @error('current_password') error @enderror">
                
                @error('current_password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Новый пароль *</label>
                <input type="password" id="password" name="password" required
                    class="form-input @error('password') error @enderror">
                <p class="password-hint">Минимум 8 символов</p>
                
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Подтверждение нового пароля *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="form-input">
                <p class="password-hint">Повторите новый пароль</p>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Изменить пароль
                </button>
                
                <a href="{{ route('profile') }}" class="btn btn-secondary">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
