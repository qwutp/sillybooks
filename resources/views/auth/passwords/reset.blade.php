@extends('layouts.app')

@section('title', 'Сброс пароля')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="py-4 px-6 bg-gray-50 border-b">
            <h2 class="text-2xl font-bold text-gray-800">Сброс пароля</h2>
        </div>
        
        <form method="POST" action="{{ route('password.update') }}" class="py-4 px-6">
            @csrf
            
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('email') border-red-500 @enderror">
                
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Новый пароль</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('password') border-red-500 @enderror">
                
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="password-confirm" class="block text-gray-700 font-medium mb-2">Подтверждение пароля</label>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>
            
            <div class="flex items-center justify-between mb-4">
                <button type="submit" class="bg-yellow-500 text-black font-semibold px-6 py-2 rounded hover:bg-yellow-600 transition">
                    Сбросить пароль
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
