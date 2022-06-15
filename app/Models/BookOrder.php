<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;

    protected $table = "bokk_order";
    protected $fillable = [
        'book_id',
        'user_id',
        'status',
    ];
}
