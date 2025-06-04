<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    /**
     * Check if the user has a specific role.
     */
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
    
    /**
     * Check if the user has a specific permission.
     */
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
    
    /**
     * Get the reviews for the user.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    /**
     * Get the user books for the user.
     */
    public function userBooks()
    {
        return $this->hasMany(UserBook::class);
    }
    
    /**
     * Get the books for the user.
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'user_books')
                    ->withPivot('status', 'progress')
                    ->withTimestamps();
    }
}
