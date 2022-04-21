<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Illuminate\Auth\Notifications\ResetPassword;

class ResetPasswordToken extends Model
{
    use HasFactory;
    protected $table = "reset_password_token";

    protected $fillable = ["user_id", "token"];

    public static function createResetPasswordToken($userId)
    {
        $faker = Faker::create('id_ID');
        $token = $faker->md5;

        $isUserInTable = ResetPasswordToken::where('user_id', $userId)->count() > 0;

        $rpt = NULL;

        if ($isUserInTable) {
            ResetPasswordToken::where('user_id', $userId)->update([
                "token" => $token,
            ]);
        }
        else {
            $rpt = new ResetPasswordToken();
            $rpt->user_id = $userId;
            $rpt->token = $token;
            $rpt->save();
        }

        return $token;
    }

    public static function checkResetPasswordTokenExist($userId, $token)
    {
        $count = ResetPasswordToken::where("user_id", $userId)->where("token", $token)->count();
        return $count == 1;
    }

    public static function deleteResetPasswordToken($userId)
    {
        ResetPasswordToken::where('user_id', $userId)->delete();
    }
}
