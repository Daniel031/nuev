<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('welcome');
        return view('PaginaPrincipal');
    }
    public function quienesSomos()
    {
        return view('quienesSomos');
    }
    public function listaN(){
        return view('nutricionistasLista');
    }
}
