<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'writer',
        'publisher',
        'category',
        'synopsis',
        'no',
        'image',
        'count_download',
    ];
    
}
