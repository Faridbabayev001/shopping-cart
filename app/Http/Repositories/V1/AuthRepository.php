<?php


namespace App\Http\Repositories\V1;


use App\Http\Repositories\V1\Contracts\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{

    public function login($data)
    {
       return Auth::attempt($data);
    }

    /**
     *  Create user and login
     * @param $data
     * @return bool
     */
    public function register($data)
    {
        $status = false;
        $user = new User;
        $user->fill($data);
        if ($user->save()){
            auth()->loginUsingId($user->id);
            $status = true;
        }
        return $status;
    }
}
