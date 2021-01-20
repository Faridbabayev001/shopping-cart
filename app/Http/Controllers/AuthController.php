<?php

namespace App\Http\Controllers;

use App\Http\Repositories\V1\Contracts\AuthRepositoryInterface;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @var AuthRepositoryInterface
     */
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->authRepository->register($request->all());
        return $result ? redirect(route('home')) : back();
    }

    /**
     * Show login form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show_login_form()
    {
        return view('login');
    }

    /**
     *  Show register form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show_register_form()
    {
        return view('register');
    }

    /**
     *  Log out user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }
}
