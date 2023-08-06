<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
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
    public function feedbacks()
    {
        return $this->belongsTo(Feedback::class, 'feedback_id', 'id');
    }
}
