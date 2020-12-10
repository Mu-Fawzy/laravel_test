<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    
    protected $fillable = ['comments','post_id'];

    protected $hidden = [
        'post_id',
    ];

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Models\Posts\Post', 'post_id', 'id');
    }
}
