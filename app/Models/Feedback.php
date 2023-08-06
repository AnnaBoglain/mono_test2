<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    public $timestamps = false;
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
    public function ratings()
    {
        return $this->belongsTo(Rating::class, 'ratings_id', 'id');
    }
}
