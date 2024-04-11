<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity', 'image'];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
