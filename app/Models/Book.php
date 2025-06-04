<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'author_id',
        'publisher',
        'year',
        'pages',
        'language',
        'is_bestseller',
        'average_rating',
        'views',
    ];
    
    protected $casts = [
        'is_bestseller' => 'boolean',
        'year' => 'integer',
        'pages' => 'integer',
        'average_rating' => 'float',
        'views' => 'integer',
    ];
    
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function userBooks()
    {
        return $this->hasMany(UserBook::class);
    }
    
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
