<?php


namespace App\Http\Repositories\V1;


use App\Http\Helpers\Basket;
use App\Http\Repositories\V1\Contracts\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository implements OrderRepositoryInterface
{

    public function sendOrder($data)
    {
        $success = false;
        if (auth()->check()) $data['user_id'] = auth()->user()->id;
        $data['code'] = $this->generateOrderCode();
        $data['amount'] = Basket::sumProductPrice();
        $order = new Order;
        $order->fill($data);
        if ($order->save()){
            $products = Basket::get();
            $orderItems = [];
            foreach ($products as $productId => $product) {
                $orderItems[] = [
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $product['count'],
                    'item_price' => $product['price'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            OrderItem::insert($orderItems);
            Basket::destroy();
            $success = true;
        }

        return $success;
    }

    private  function generateOrderCode($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
