<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //antes de entrar al dashboard revisamos que el usuario este autenticado
    }

    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }
}
