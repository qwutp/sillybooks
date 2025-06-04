@extends('layouts.admin')

@section('title', 'Редактировать автора')

@section('content')
<div class="d-flex align-center mb-6">
    <a href="{{ route('admin.authors.index') }}" style="color: #6b7280; text-decoration: none; margin-right: 1rem;">
        ← Назад
    </a>
    <h2>Редактировать автора: {{ $author->name }}</h2>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.authors.update', $author) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <!-- Имя автора -->
                <div class="form-group">
                    <label for="name" class="form-label">Имя автора *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" required
                           class="form-control @error('name') error @enderror">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Дата рождения -->
                <div class="form-group">
                    <label for="birth_date" class="form-label">Дата рождения</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $author->birth_date?->format('Y-m-d')) }}"
                           class="form-control @error('birth_date') error @enderror">
                    @error('birth_date')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Биография -->
            <div class="form-group">
                <label for="bio" class="form-label">Биография</label>
                <textarea name="bio" id="bio" rows="6"
                          class="form-control @error('bio') error @enderror">{{ old('bio', $author->bio) }}</textarea>
                @error('bio')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Текущее фото -->
            @if($author->image && file_exists(public_path('images/authors/' . $author->image)))
                <div class="form-group">
                    <label class="form-label">Текущее фото</label>
                    <div>
                        <img src="{{ asset('images/authors/' . $author->image) }}" alt="{{ $author->name }}" 
                             style="width: 128px; height: 128px; object-fit: cover; border-radius: 50%;">
                    </div>
                </div>
            @endif

            <!-- Новое фото -->
            <div class="form-group">
                <label for="image" class="form-label">Изменить фото</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="form-control @error('image') error @enderror">
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопки -->
            <div class="d-flex justify-between" style="padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
                <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">
                    Отмена
                </a>
                <button type="submit" class="btn btn-primary">
                    Сохранить изменения
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
