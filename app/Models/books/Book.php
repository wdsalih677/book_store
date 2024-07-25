<?php

namespace App\Models\books;

use App\Models\categories\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class , 'category_id');
    }
}
