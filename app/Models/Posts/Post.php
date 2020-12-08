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
    
    protected $fillable = ['title','slug','description','content','image','active','views'];

    public function getActiveAttribute($value)
    {
        return $value == 0 ? 'Inactive' : 'Active';
    }
    public function getImageAttribute($value)
    {
        return $value = 'assets/admin/img/'.$value;
    }
}
