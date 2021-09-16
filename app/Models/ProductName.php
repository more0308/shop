<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    protected $primaryKey = ['product_id', 'language'];
    public $incrementing = false;
}
