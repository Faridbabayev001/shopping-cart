<?php


namespace App\Http\Repositories\V1\Contracts;


interface OrderRepositoryInterface
{
    public function sendOrder($data);
}
