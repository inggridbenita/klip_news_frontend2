<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $userId = session('id');
        $username = User::getUserName($userId);
        $data = [
            "username" => $username,
            "page_name" => "history",
        ];
        return view('pages.user.history', $data);
    }
}
