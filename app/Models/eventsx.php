<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventsx extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user->id',
        'posts->id',
        'event',
        'description'
    ];
}
