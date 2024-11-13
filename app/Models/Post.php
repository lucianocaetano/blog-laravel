<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable = [
        "title",
        "slug",
        "description",
        "content",
        "user_id"
    ];

    function user () {
        return $this->belongsTo(User::class);
    }

    function getRouteKeyName()
    {
        return "slug";
    }
}
