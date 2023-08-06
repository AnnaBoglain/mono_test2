<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    use HasFactory;

    public function feedbacks()
    {
        return $this->belongsTo(Feedback::class, 'user_id', 'id');
    }

    public function ratings()
    {
        return $this->belongsTo(Rating::class, 'user_id', 'id');
    }
}
