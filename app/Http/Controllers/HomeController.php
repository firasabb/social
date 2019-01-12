<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        $socialAccounts = $user->socialAccounts()->get();
        $facebook = $socialAccounts->where('provider', 'facebook')->first();
        $instagram = $socialAccounts->where('provider', 'instagram')->first();

        return view('home', ['user' => $user, 'facebook' => $facebook, 'instagram' => $instagram]);
    }
}
