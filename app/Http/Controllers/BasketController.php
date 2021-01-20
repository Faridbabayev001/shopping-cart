<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Basket;
use App\Http\Repositories\V1\Contracts\BasketRepositoryInterface;
use App\Http\Repositories\V1\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * @var BasketRepositoryInterface
     */
    private $basketRepository;
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    public function __construct(BasketRepositoryInterface $basketRepository, ProductRepositoryInterface $productRepository)
    {
        $this->basketRepository = $basketRepository;
        $this->productRepository = $productRepository;
    }

    /**
     *  Check product stock and add to basket
     *
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToBasket($productId)
    {
        $product = $this->productRepository->find_by_id($productId);
        $basket = $this->basketRepository->addToBasket($productId,$product);
        if ($basket){
            session()->flash('success','Product add to basket');
        } else {
            session()->flash('error','There are not enough products in stock.');
        }
        return back();
    }

    public function getCartContent()
    {
        return Basket::render();
    }

    /**
     *  Update product count
     * @param $productId
     * @param $productCount
     * @return \Illuminate\View\View
     */
    public function updateProductCount($productId,$productCount)
    {
        $product = $this->productRepository->find_by_id($productId);
        $this->basketRepository->updateProductCount($productId,$productCount,$product->stock);
        return Basket::render();
    }

    /**
     * @param $productId
     * @return \Illuminate\View\View
     */
    public function removeProduct($productId)
    {
        $this->basketRepository->removeProduct($productId);
        return request()->ajax() ? Basket::render() : back()->with(['success' =>'Remove product from cart']);
    }
}
