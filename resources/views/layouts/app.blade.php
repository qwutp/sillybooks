<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SillyBooks - @yield('title')</title>
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
            background-color: #ffffff;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Druk Wide Cyr', Arial, sans-serif;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .primary-color {
            color: #B57219;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        header {
            padding: 1rem 0;
            background: white;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Druk Wide Cyr', Arial, sans-serif;
            font-size: 1.25rem;
            text-decoration: none;
            color: #333;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
            position: relative;
            padding-bottom: 0.25rem;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #B57219;
        }

        .nav-menu a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #B57219;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            overflow: hidden;
            margin-left: 0.5rem;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
        }

        .btn-primary {
            background-color: #B57219;
            color: white;
        }

        .btn-primary:hover {
            background-color: #9A5F14;
        }

        footer {
            margin-top: 4rem;
            padding: 1.5rem 0;
            border-top: 1px solid #e5e7eb;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-links {
            display: flex;
            gap: 1rem;
        }

        .footer-links a {
            color: #6b7280;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #B57219;
        }

        .footer-contact {
            color: #6b7280;
            font-size: 0.875rem;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-menu {
                gap: 1rem;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    <span class="primary-color">SILLY</span>BOOKS
                </a>
                
                <nav class="nav-menu">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Главная</a>
                    <a href="{{ route('recommendations') }}" class="{{ request()->routeIs('recommendations') ? 'active' : '' }}">Рекомендации</a>
                    <a href="{{ route('my-books') }}" class="{{ request()->routeIs('my-books') ? 'active' : '' }}">Мои книги</a>
                    
                    @auth
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.dashboard') }}">Админ панель</a>
                        @endif
                    @endauth
                </nav>
                
                <div class="user-section">
                    @auth
                        <a href="{{ route('profile') }}" class="user-profile">
                            <span>{{ auth()->user()->name }}</span>
                            <div class="user-avatar">
                                <img src="/images/avatars/{{ auth()->user()->avatar ?? 'default.jpg' }}" alt="{{ auth()->user()->name }}">
                            </div>
                        </a>
                    @else
                        <a href="{{ route('login') }}" style="color: #6b7280; text-decoration: none;">Войти</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Регистрация</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div>
                    <a href="{{ route('home') }}" class="logo">
                        <span class="primary-color">SILLY</span>BOOKS
                    </a>
                </div>
                
                <div class="footer-links">
                    <a href="#">Facebook</a>
                    <a href="#">Instagram</a>
                    <a href="#">Twitter</a>
                </div>
                
                <div class="footer-contact">
                    <p>+7 495 123-45-67 | support@sillybooks.com</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
