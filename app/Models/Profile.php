<?php

namespace App\Models;

use App\Models\Dashboard\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "profiles";

    protected $fillable = ['phone','twitter','facebook','address','bio','admin_id','gender'];

    protected $hidden = ['created_at' ,'updated_at' ,'admin_id'];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id', 'id');
    }
}
