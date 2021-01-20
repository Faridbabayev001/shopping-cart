<?php


namespace App\Http\Repositories\V1;


use App\Http\Helpers\Basket;
use App\Http\Repositories\V1\Contracts\BasketRepositoryInterface;

class BasketRepository implements BasketRepositoryInterface
{
    /**
     * Add to basket
     * @param $id
     * @param $product
     * @return bool
     */
    public function addToBasket($id, $product)
    {
        $status = false;
        if ($product['stock'] > 1) {
            Basket::add($id,$product);
            $status = true;
        }
        return $status;
    }

    /**
     * Update product count
     * @param $productId
     * @param $productCount
     * @param $stock
     */
    public function updateProductCount($productId, $productCount,$stock)
    {
        $basketItem = Basket::findProduct($productId);
        if (!is_null($basketItem)) {
            $newCount = $basketItem['count'] + $productCount;
            if ($newCount < $stock) {
                Basket::updateCount($productId,$productCount);
            }
        }
    }

    /**
     * Remove product from basket
     * @param $productId
     */
    public function removeProduct($productId)
    {
       Basket::remove($productId);
    }
}
