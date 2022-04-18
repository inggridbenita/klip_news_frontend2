<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    public static function get_user_count() {
        return DB::table('users')->count();
    }

    public static function check_login($email, $password)
    {
        $is_email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $user = NULL;
        if ($is_email) {
            $user = User::where('email', $email)->get();
        }
        else {
            $user = User::where('phone_number', $email)->get();
        }

        $isPasswordTrue = false;
        if (count($user) == 1) {
            $isPasswordTrue = Hash::check($password, $user[0]->password);
        }
        return $isPasswordTrue;
    }

    public static function getUserName($userId)
    {
        return User::find($userId)->name;
    }
}
