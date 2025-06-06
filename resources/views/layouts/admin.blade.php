<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SillyBooks Admin - @yield('title')</title>
    <style>
        @font-face {
            font-family: 'Druk Wide Cyr';
            src: url('/fonts/DrukWideCyr-Bold.woff2') format('woff2'),
                 url('/fonts/DrukWideCyr-Bold.woff') format('woff');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Druk Wide Cyr', Arial, sans-serif;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .primary-color {
            color: #B57219;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 280px;
            background: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .sidebar-brand a {
            text-decoration: none;
            color: inherit;
        }

        .sidebar-brand h2 {
            font-size: 1.5rem;
            margin: 0;
        }

        .sidebar-brand p {
            color: #6b7280;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: #4b5563;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar-link:hover {
            background-color: #f3f4f6;
            color: #B57219;
        }

        .sidebar-link.active {
            background-color: #B57219;
            color: white;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .sidebar-footer a {
            display: flex;
            align-items: center;
            color: #4b5563;
            text-decoration: none;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .sidebar-footer a:hover {
            color: #B57219;
        }

        .sidebar-footer button {
            display: flex;
            align-items: center;
            background: none;
            border: none;
            color: #4b5563;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            padding: 0;
        }

        .sidebar-footer button:hover {
            color: #B57219;
        }

        .admin-content {
            flex: 1;
            margin-left: 280px;
        }

        .admin-header {
            background: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-header h1 {
            margin: 0;
            font-size: 1.75rem;
        }

        .admin-user {
            display: flex;
            align-items: center;
        }

        .admin-user span {
            margin-right: 1rem;
            font-weight: 500;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            background: #ddd;
        }

        .admin-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .admin-main {
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            background-color: #f9fafb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            margin: 0;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #B57219;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .table th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #374151;
        }

        .table tr:hover {
            background-color: #f9fafb;
        }

        .table img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #B57219;
            box-shadow: 0 0 0 2px rgba(181, 114, 25, 0.2);
        }

        .form-control.error {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .search-box {
            position: relative;
            max-width: 400px;
        }

        .search-box input {
            padding-left: 2.5rem;
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
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
            font-family: 'Druk Wide Cyr', Arial, sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
        }

        .btn-primary {
            background-color: #B57219;
            color: white;
        }

        .btn-primary:hover {
            background-color: #9A5F14;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.375rem;
            text-transform: uppercase;
        }

        .badge-admin {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-user {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: #d1fae5;
            border-color: #a7f3d0;
            color: #047857;
        }

        .alert-danger {
            background-color: #fee2e2;
            border-color: #fecaca;
            color: #b91c1c;
        }
        .d-flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .align-center {
            align-items: center;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .admin-sidebar.open {
                transform: translateX(0);
            }

            .admin-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .search-box {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <div class="admin-sidebar">
            <div class="sidebar-brand">
                <a href="{{ route('home') }}">
                    <h2><span class="primary-color">SILLY</span>BOOKS</h2>
                </a>
                <p>Панель управления</p>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Панель управления
                </a>
                
                <a href="{{ route('admin.books.index') }}" class="sidebar-link {{ request()->routeIs('admin.books.*') ? 'active' : '' }}">
                    Книги
                </a>
                
                <a href="{{ route('admin.authors.index') }}" class="sidebar-link {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
                    Авторы
                </a>
                
                <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    Пользователи
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <a href="{{ route('home') }}">
                    Перейти на сайт
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        Выйти
                    </button>
                </form>
            </div>
        </div>
        <div class="admin-content">
            <header class="admin-header">
                <h1>@yield('title')</h1>
                
                <div class="admin-user">
                    <span>{{ Auth::user()->name }}</span>
                    <div class="admin-avatar">
                        <img src="/images/avatars/{{ Auth::user()->avatar ?? 'default.jpg' }}" alt="{{ Auth::user()->name }}">
                    </div>
                </div>
            </header>
            
            <main class="admin-main">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function confirmDelete(userName) {
            return confirm(`Вы уверены, что хотите удалить пользователя "${userName}"? Это действие нельзя отменить.`);
        }
    </script>
</body>
</html>
