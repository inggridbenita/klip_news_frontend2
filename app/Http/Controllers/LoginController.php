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
        $isSuccessLogin = User::check_login($request->email, $request->password);
        if ($isSuccessLogin) {
            $is_email = filter_var($request->email, FILTER_VALIDATE_EMAIL);
            $user_id = NULL;
            if ($is_email) {
                $user_id = User::where('email', $request->email)->pluck('id')[0];
            }
            else {
                $user_id = User::where('phone_number', $request->email)->pluck('id')[0];
            }
            session(['id' => $user_id]);
        }
        return json_encode($isSuccessLogin);
    }
}
