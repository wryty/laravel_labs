<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country'
    ];

    public function users() 
    {
        return $this->hasMany(User::class);
    }

    public function articles() 
    {
        return $this->hasMany(Article::class);
    }
}
