<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'description',
        'views',
        'approved',
        'user_id'
    ];
    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class);
    }
    
}
