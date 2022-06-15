<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'book_name',
        'book_description',
        'ratings',
        'book_genre',
        'book_cover',
    ];
}
