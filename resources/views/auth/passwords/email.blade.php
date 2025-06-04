@extends('layouts.app')

@section('title', 'Сброс пароля')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="py-4 px-6 bg-gray-50 border-b">
            <h2 class="text-2xl font-bold text-gray-800">Сброс пароля</h2>
        </div>
        
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-6 mt-6" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}" class="py-4 px-6">
            @csrf
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('email') border-red-500 @enderror">
                
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between mb-4">
                <button type="submit" class="bg-yellow-500 text-black font-semibold px-6 py-2 rounded hover:bg-yellow-600 transition">
                    Отправить ссылку для сброса пароля
                </button>
            </div>
            
            <div class="text-center">
                <p class="text-gray-600">Вспомнили пароль? <a href="{{ route('login') }}" class="text-yellow-500 hover:underline">Войти</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
