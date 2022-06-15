<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "book_review";
    protected $fillable = [
        'book_id',
        'user_id',
        'book_review',
    ];
}
