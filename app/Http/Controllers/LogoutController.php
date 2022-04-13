<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        session('id', 0);
        return redirect()->route('login');
    }
}
