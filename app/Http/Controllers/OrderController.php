<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Basket;
use App\Http\Repositories\V1\Contracts\OrderRepositoryInterface;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     *  Show checkout form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function checkout()
    {
        $basket = Basket::get();
        return !empty($basket) ? view('checkout') : back();
    }

    public function sendOrder(OrderRequest $request)
    {
        $result = $this->orderRepository->sendOrder($request->all());
        return $result ? redirect(route('home'))->with(['success' => 'Send Order']) : back()->with(['error' => 'Error']);
    }
}
