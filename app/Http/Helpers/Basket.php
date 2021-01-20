<?php


namespace App\Http\Helpers;


class Basket
{
    /**
     *
     *  Render cart view list
     *
     * @return \Illuminate\View\View
     */
    public static function render()
    {
        $items = self::get();
        $productPrice = self::sumProductPrice();
        $productCount = self::getAllProductCounts();
        return view('partials.cart',compact('items','productPrice','productCount'));
    }

    /**
     *
     * Add cart to session by product id
     *
     * @param int $id
     * @param array $data
     */
    public static function add($id,$data)
    {
        $cart = self::get();
        $cart[$id] = [
            'name' => $data['name'],
            'image' => $data['image'],
            'price' => $data['price'],
            'count' => 1,
        ];
        self::update($cart);
    }

    /**
     * Check product from cart by product id
     *
     * @param $id
     * @return bool
     */
    public static function check($id)
    {
        $cart = self::get();
        return isset($cart[$id]);
    }


    /**
     *
     *  Get all product count from cart
     *
     * @return mixed|null
     */
    public static function getAllProductCounts()
    {
        return array_reduce(self::get(), function($count, $value) {
            return $count + $value['count'];
        });
    }

    /**
     *
     * Sum all product price from cart
     *
     * @return mixed|null
     */
    public static function sumProductPrice()
    {
        return array_reduce(self::get(), function($price, $value) {
            return $price + ($value['price'] * $value['count']);
        });
    }
    /**
     *
     * Get cart count
     *
     * @return int
     */
    public static function getCartCount()
    {
        $cart = self::get();
        return count($cart);
    }

    /**
     *
     * Update product count by product id
     *
     * @param int $id
     * @param int $count
     */
    public static function updateCount($id,$count)
    {
        $cart = self::get();
        if (isset($cart[$id])) {
            $cart[$id]['count'] = $count;
            self::update($cart);
        }
    }

    /**
     *
     * Remove cart from session by product id
     *
     * @param int $id
     */
    public static function remove($id)
    {
        $cart = self::get();
        if (isset($cart[$id])){
            unset($cart[$id]);
            self::update($cart);
        }
    }

    /**
     *  Delete all product from basket
     */
    public static function destroy()
    {
        session()->forget('cart');
    }

    /**
     *
     * Get all cart from session
     *
     * @return array|mixed
     */
    public static function get()
    {
        $cart = session()->get('cart');
        return $cart ? $cart : [];
    }

    /**
     * Find product from basket
     * @param $id
     * @return mixed|null
     */
    public static function findProduct($id)
    {
        $cart = self::get();
        return isset($cart[$id]) ? $cart[$id] : null;
    }

    /**
     *
     * Update cart
     *
     * @param array $cart
     */
    private static function update($cart)
    {
        session()->put('cart', $cart);
    }
}
