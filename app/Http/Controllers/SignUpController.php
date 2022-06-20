<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SignUpController extends Controller
{
    public function index()
    {
        $data = [
            "page_name" => "signup",
        ];
        return view('pages.signup', $data);
    }

    public function storeUser(Request $request)
    {
        $user = new User;
        
        $user->id = User::get_user_count() + 1;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();

        return Redirect::to("http://127.0.0.1:8000/login?alert=success&message_type=1");
    }
}
