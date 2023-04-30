<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'summery',
        'description',
        'image',
        'tags',
        'read_time',
        'persian_date',
    ];


    protected $hidden = [
//        '',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
