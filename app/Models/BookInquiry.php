<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'phone',
        'email',
        'item_name',
        'pickup_date',
        '_token',
    ];
}