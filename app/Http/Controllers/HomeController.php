<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //sono protetto: posso accederci solo
    //se autenticato
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        //prendo tutti i prodotti inseriti dall'utente loggato
        $userProducts = $currentUser->products()->get();
        return view('home', ['userProducts' => $userProducts]);
    }
}
