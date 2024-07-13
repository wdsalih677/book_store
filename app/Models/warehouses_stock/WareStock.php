<?php

namespace App\Models\warehouses_stock;

use App\Models\books\Book;
use App\Models\warehouses\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareStock extends Model
{
    protected $table = "ware_stocks";
    protected $guarded = [];
    use HasFactory;

    public function books(){
        return $this->belongsTo(Book::class , 'book_id');
    }

    public function warehouses(){
        return $this->belongsTo(Warehouse::class , 'warehouses_id');
    }
}
