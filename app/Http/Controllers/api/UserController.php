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

    public static function validateEmailAvailableForUpdate($email, $userId)
    {
        return User::where('email', $email)->where('id', '!=', $userId)->count() == 0;
    }

    public static function validatePhoneNumberAvailableForUpdate($phone_number, $userId)
    {
        return User::where('phone_number', $phone_number)->where('id', '!=', $userId)->count() == 0;
    }

    public function edit(Request $request)
    {
        $userId = session('id');
        if (!UserController::validateEmailAvailableForUpdate($request->email, $userId)) {
            return 'Email not available';
        }
        else if (!UserController::validatePhoneNumberAvailableForUpdate($request->phone_number, $userId)) {
            return 'Phone number not available';
        }
        
        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();
        return 'Success';
    }
}
