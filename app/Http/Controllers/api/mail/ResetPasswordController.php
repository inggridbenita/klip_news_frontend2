<?php

namespace App\Http\Controllers\api\mail;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\ResetPasswordToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        $userId = User::where('email', $request->email)->first()->id;
        $token = ResetPasswordToken::createResetPasswordToken($userId);
        Mail::to($request->email)->send(new ResetPasswordMail($request->email, $token));
    }
}
