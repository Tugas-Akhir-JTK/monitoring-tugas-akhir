<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            $role = Auth()->user()->role;
            if ($role == '1') {
                return view('beranda/koordinator/home');
            } elseif ($role == '2') {
                return view('beranda/pembimbing/home');
            } elseif ($role == '3') {
                return view('beranda/mahasiswa/home');
            }
        }
    }
}
