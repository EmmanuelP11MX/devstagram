<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //antes de entrar al dashboard revisamos que el usuario este autenticado
    }

    public function index()
    {
        return view('dashboard');
    }
}
