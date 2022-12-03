<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ゲストユーザー
        User::create([
            'name' => 'guest',
            'email' => 'tester@example.com',
            'password' => 'p@ssw0rd',
            ]);
    }
}
