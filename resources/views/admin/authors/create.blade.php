@extends('layouts.admin')

@section('title', 'Добавить автора')

@section('content')
<div class="d-flex align-center mb-6">
    <a href="{{ route('admin.authors.index') }}" style="color: #6b7280; text-decoration: none; margin-right: 1rem;">
        ← Назад
    </a>
    <h2>Добавить нового автора</h2>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Имя автора *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="form-control @error('name') error @enderror">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bio" class="form-label">Биография</label>
                <textarea name="bio" id="bio" rows="6"
                          class="form-control @error('bio') error @enderror">{{ old('bio') }}</textarea>
                @error('bio')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Фото автора</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="form-control @error('image') error @enderror">
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-between" style="padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
                <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">
                    Отмена
                </a>
                <button type="submit" class="btn btn-primary">
                    Добавить автора
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
