<?php


namespace App\Http\Repositories\V1;


use App\Http\Repositories\V1\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Get all products
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all_products()
    {
        return Product::all();
    }

    public function find_by_id($id)
    {
        return Product::findOrFail($id);
    }
}
