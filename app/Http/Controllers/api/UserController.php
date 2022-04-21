<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function checkExistByEmail(Request $request)
    {
        $count = User::where('email', $request->email)->count();
        return json_encode($count == 1);
    }

    public function resetPassword(Request $request)
    {
        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();
    }
}
