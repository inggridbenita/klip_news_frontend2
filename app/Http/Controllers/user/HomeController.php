<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $userId = session('id');
        $username = User::getUserName($userId);
        $data = [
            "username" => $username,
            "page_name" => "home",
        ];
        return view('pages.user.home', $data);
    }
}
