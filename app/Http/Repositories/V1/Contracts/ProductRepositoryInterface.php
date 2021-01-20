<?php


namespace App\Http\Repositories\V1\Contracts;


interface ProductRepositoryInterface
{
    public function all_products();

    public function find_by_id($id);
}
