@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<style>
    .auth-container {
        max-width: 400px;
        margin: 4rem auto;
        padding: 0 1rem;
    }
    .auth-card {
        background: white;
        border-radius: 0.75rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .auth-header {
        padding: 2rem 2rem 1rem 2rem;
        background: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }
    .auth-body {
        padding: 2rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        font-size: 1rem;
    }
    .form-control:focus {
        outline: none;
        border-color: #B57219;
        box-shadow: 0 0 0 2px rgba(181, 114, 25, 0.2);
    }
    .form-control.error {
        border-color: #dc3545;
    }
    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }
    .btn-primary {
        background-color: #B57219;
        color: white;
    }
    .btn-primary:hover {
        background-color: #9a5f14;
    }
    .checkbox-group {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }
    .checkbox-group input {
        margin-right: 0.5rem;
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h2 style="margin: 0; font-size: 1.5rem; color: #333;">Вход</h2>
        </div>
        
        <form method="POST" action="{{ route('login') }}" class="auth-body">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="form-control @error('email') error @enderror">
                
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input id="password" type="password" name="password" required
                    class="form-control @error('password') error @enderror">
                
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="checkbox-group">
                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Запомнить меня</label>
            </div>
            
            <div style="margin-bottom: 1rem;">
                <button type="submit" class="btn btn-primary">
                    Войти
                </button>
            </div>
            
            <div style="text-align: center;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: #B57219; text-decoration: none; font-size: 0.9rem;">
                        Забыли пароль?
                    </a>
                @endif
            </div>
            
            <div style="text-align: center; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #ddd;">
                <p style="color: #666; margin: 0;">Нет аккаунта? <a href="{{ route('register') }}" style="color: #B57219; text-decoration: none;">Зарегистрироваться</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
