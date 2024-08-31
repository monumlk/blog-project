<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=new user;
        $user->name="helo";
        $user->email="admin@gmail.com";
        $user->password= bcrypt("password");
        $user->usertype="admin";

        $user->save();
    }
}
