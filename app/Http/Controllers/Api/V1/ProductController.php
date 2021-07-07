<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $limit = $request->has('limit') ? $request->limit : 25;

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

                return response()->json([
                    'success' => true,
                    'message' => "",
                    'data' => $products->items(),
                    'paginate' => Product::pagination($products),
                ]);

        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
                'data' => [],
                'paginate' => [],
            ]);
        }

        

        
    }

}
