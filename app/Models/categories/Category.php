<?php

namespace App\Models\categories;

use App\Models\books\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = [];
    use HasFactory;

    public function books(){
        return $this->hasMany(Book::class , 'category_id', 'id' );
    }
}
