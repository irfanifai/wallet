<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'irfanifai',
            'email'    => 'irfan@mail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name'     => 'ali',
            'email'    => 'ali@mail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
