<?php


namespace App\Http\Repositories\V1\Contracts;


interface AuthRepositoryInterface
{
    public function login($data);

    public function register($data);
}
