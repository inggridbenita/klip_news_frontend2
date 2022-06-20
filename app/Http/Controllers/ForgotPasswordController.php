<?php

namespace App\Http\Controllers;

use App\Models\ResetPasswordToken;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function begin_reset_password()
    {
        $data = [
            "page_name" => "begin_reset_password",
        ];
        return view('pages.forgot_password.forgot_password', $data);
    }

    public function reset_password(Request $request)
    {
        $isTokenExist = ResetPasswordToken::checkResetPasswordTokenExist($request->userid, $request->token);
        if ($isTokenExist) {
            ResetPasswordToken::deleteResetPasswordToken($request->userid);
            $data = [
                "page_name" => "change_password",
            ];
            return view('pages.forgot_password.change_password', $data);
        }
        else {
            $data = [
                "page_name" => "errors_400",
            ];
            return view('errors.400', $data);
        }
    }
}
