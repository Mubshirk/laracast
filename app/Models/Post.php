<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category' , 'aurther'];

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function aurther(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
