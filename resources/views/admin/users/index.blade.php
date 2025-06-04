@extends('layouts.admin')

@section('title', 'Управление пользователями')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-between align-center">
            <h3>Список пользователей</h3>
            
            <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex" style="gap: 0.5rem;">
                <input type="text" name="search" class="form-control" placeholder="Поиск по имени или email..." value="{{ request('search') }}" style="width: 300px;">
                <button type="submit" class="btn btn-primary">Поиск</button>
                @if(request('search'))
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Сбросить</a>
                @endif
            </form>
        </div>
        
        <div class="card-body">
            @if($users->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Аватар</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Роль</th>
                                <th>Дата регистрации</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        @if($user->avatar)
                                            <img src="/images/avatars/{{ $user->avatar }}" alt="{{ $user->name }}" width="40" height="40" style="border-radius: 50%; object-fit: cover;">
                                        @else
                                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #B57219; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">{{ substr($user->name, 0, 1) }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role_id == 1)
                                            <span style="background-color: #dc3545; color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">Администратор</span>
                                        @else
                                            <span style="background-color: #6c757d; color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">Пользователь</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                                    <td>
                                        @if(Auth::id() != $user->id)
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirmDelete('{{ $user->name }}')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        @else
                                            <span style="color: #6c757d; font-size: 0.875rem;">Текущий пользователь</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            @else
                <p class="text-center">Пользователи не найдены.</p>
            @endif
        </div>
    </div>

    <script>
        function confirmDelete(userName) {
            return confirm('Вы уверены, что хотите удалить пользователя "' + userName + '"? Это действие нельзя отменить.');
        }
    </script>
@endsection
