<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'posts';
    
    protected $fillable = ['title','slug','description','content','image', 'admin_id','active','views'];

    protected $hidden = [
        'admin_id',
    ];

    public $timestamps = false;

    public function getActiveAttribute($value)
    {
        return $value == 0 ? 'Inactive' : 'Active';
    }
    public function getImageAttribute($value)
    {
        return $value = 'assets/admin/img/'.$value;
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Dashboard\Admin','admin_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Posts\Comment', 'post_id', 'id');
    }
}
