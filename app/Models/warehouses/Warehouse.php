<?php

namespace App\Models\warehouses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = "warehouses";
    protected $guarded = [];
    use HasFactory;
}
