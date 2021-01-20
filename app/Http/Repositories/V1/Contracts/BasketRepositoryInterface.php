<?php


namespace App\Http\Repositories\V1\Contracts;


interface BasketRepositoryInterface
{
    public function addToBasket($id,$product);

    public function updateProductCount($productId,$productCount,$stock);

    public function removeProduct($productId);
}
