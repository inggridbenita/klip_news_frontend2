<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User;

        $user1->id = 1;
        $user1->name = 'inggrid benita';
        $user1->email = 'inggridrb@gmail.com';
        $user1->phone_number = '082119336338';
        $user1->password = '$2y$10$9y2NFbX/1lcK8HwuZK9riOkLIjVLt16NaUN09Su39SSuwAMWe90XC';
        $user1->save();

        $user2 = new User;
        $user2->id = 2;
        $user2->name = 'Mercusys Mw';
        $user2->email = 'mercusysmw@gmail.com';
        $user2->phone_number = '087548358921';
        $user2->password = '$2y$10$LuaqXIFZn.qKpXx4iXyS9uzpBwn6GXGosMl4bhIJxAwWN6sXhq/VO';
        $user2->save();
    }
}
