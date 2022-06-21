<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $userId = session('id');
        $username = User::getUserName($userId);
        $userProfile = User::where('id', $userId)->select()->first();
        $data = [
            "username" => $username,
            "page_name" => "profile",
            "user_profile" => $userProfile,
        ];
        return view('pages.user.profile', $data);
    }
}
