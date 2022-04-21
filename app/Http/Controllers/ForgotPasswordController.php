<?php

namespace App\Http\Controllers;

use App\Models\ResetPasswordToken;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function begin_reset_password()
    {
        return view('pages.forgot_password.forgot_password');
    }

    public function reset_password(Request $request)
    {
        $isTokenExist = ResetPasswordToken::checkResetPasswordTokenExist($request->userid, $request->token);
        if ($isTokenExist) {
            ResetPasswordToken::deleteResetPasswordToken($request->userid);
            return view('pages.forgot_password.change_password');
        }
        else {
            return view('errors.400');
        }
    }
}
