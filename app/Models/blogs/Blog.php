<?php

namespace App\Models\blogs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blogs";
    protected $guarded = [];
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class , 'post_by');
    }
}
