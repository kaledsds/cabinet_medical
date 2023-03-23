<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class toguest extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $this->middleware('guest');
    }
    public function __construct()
    {
        $this->middleware('guest');
    }
}



