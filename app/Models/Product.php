<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    use HasFactory;

    public function feedbacks()
    {
        return $this->belongsTo(Feedback::class, 'product_id', 'id');
    }

    public function ratings()
    {
        return $this->belongsTo(Rating::class, 'product_id', 'id');
    }
}
