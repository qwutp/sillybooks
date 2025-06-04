<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    /**
     * Handle a registration request for the application.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                'unique:users',
                function ($attribute, $value, $fail) {
                    // Список разрешенных доменов
                    $allowedDomains = [
                        'gmail.com', 'yandex.ru', 'yandex.com', 'mail.ru', 
                        'outlook.com', 'hotmail.com', 'yahoo.com', 'icloud.com',
                        'rambler.ru', 'list.ru', 'bk.ru', 'inbox.ru',
                        'protonmail.com', 'tutanota.com', 'zoho.com'
                    ];
                    
                    $domain = strtolower(substr(strrchr($value, "@"), 1));
                    
                    if (!in_array($domain, $allowedDomains)) {
                        $fail('Пожалуйста, используйте email с одного из популярных сервисов (Gmail, Yandex, Mail.ru и др.)');
                    }
                    
                    // Дополнительная проверка на корректность домена
                    if (!checkdnsrr($domain, 'MX') && !checkdnsrr($domain, 'A')) {
                        $fail('Указанный email домен не существует.');
                    }
                }
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        // Получаем роль пользователя
        $role = Role::where('slug', 'user')->first();
        
        // Если роль не найдена, создаем ее
        if (!$role) {
            Log::warning('Role "user" not found. Creating it now.');
            $role = Role::create([
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Regular user',
            ]);
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email), // Приводим к нижнему регистру
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
        ]);
        
        Auth::login($user);
        
        return redirect(route('home'));
    }
}
