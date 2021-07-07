<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "test_1_category";

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id',
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }


}
