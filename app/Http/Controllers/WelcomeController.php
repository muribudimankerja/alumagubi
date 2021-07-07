<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 25;
        $search = $request->has('search') ? $request->search : null;
        $category_id = $request->has('category_id') ? $request->category_id : null;

        $categories = Category::withCount('products')
                ->has('products','>',0)
                ->get();

        $products = Product::with([
                'category'
            ])
            ->applyFilters($request->only([
                'search',
                'category_id',
            ]))
            ->select('test_1_product.*')
            ->orderBy('test_1_product.id', 'DESC')
            ->paginateData($limit);

        return view('welcome')->with([
            'categories' => $categories,
            'products' => $products,
            'search' => $search,
            'category_id' => $category_id,
            'i' =>  (( (int) request()->input('page', 1) - 1) * $limit)
        ]);
    }
}
