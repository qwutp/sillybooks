<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($role)
    {
        if (!$this->role) {
            return false;
        }
        
        if (is_string($role)) {
            return $this->role->slug === $role;
        }
        
        return $this->role->id === $role->id;
    }
    
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function hasPermission($permission)
    {
        if (!$this->role) {
            return false;
        }
        
        if (is_string($permission)) {
            return $this->role->permissions->contains('slug', $permission);
        }
        
        return $this->role->permissions->contains('id', $permission->id);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function userBooks()
    {
        return $this->hasMany(UserBook::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'user_books')
                    ->withPivot('status', 'progress')
                    ->withTimestamps();
    }
}
