<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.login');
    }

    public function check_login(Request $request)
    {
        return json_encode(User::check_login($request->email, $request->password));
    }
}
