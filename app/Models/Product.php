<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "test_1_product";

    protected $fillable = [
        'category_id',
        'title',
        'price',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function scopeWhereSearch($query, $search)
    {
        $query->whereHas('category', function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })->orWhere('title', 'LIKE', '%' . $search . '%');
    }
    
    public function scopeWhereCategory($query, $category_id)
    {
        $query->where('category_id', $category_id);
    }

    public function scopeApplyFilters($query, array $filters)
    {
        $filters = collect($filters);
        if ($filters->get('search')) {
            $query->whereSearch($filters->get('search'));
        }
        
        if ($filters->get('category_id')) {
            $query->whereCategory($filters->get('category_id'));
        }
    }
    
    public function scopePaginateData($query, $limit)
    {
        if ($limit == 'all') {
            return collect(['data' => $query->get()]);
        } else if($limit == 'cursor') {
            return $query->cursor();
        }

        return $query->paginate($limit);
    }
    
    public static function pagination($mdl)
    {
        $paginate = [
            'total' => (int) $mdl->total(),
            'currentPage' => (int) $mdl->currentPage(),
            'lastPage' => (int) $mdl->lastPage(),
            'hasMorePages' => (boolean) $mdl->hasMorePages(),
            'perPage' => (int) $mdl->perPage(),
            'total' => (int) $mdl->total(),
            'lastItem' => (int) $mdl->lastItem(),
        ];

        return $paginate;
    }
}
