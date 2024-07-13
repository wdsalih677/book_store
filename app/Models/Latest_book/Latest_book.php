<?php

namespace App\Models\Latest_book;

use App\Models\books\Book;
use App\Models\categories\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latest_book extends Model
{
    protected $table = "latest_books";
    protected $guarded = [];

    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function books()
    {
        return $this->belongsTo(Book::class , 'book_id');
    }
}
