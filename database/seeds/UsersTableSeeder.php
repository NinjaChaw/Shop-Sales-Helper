<?php

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
        App\User::create([
            'name' => 'Kasun Wali',
            'email' => 'kasuncbwalisundara@gmail.com',
            'password' => bcrypt('123123'),
            'role' => 'admin'
        ]);

        App\User::create([
            'name' => 'Sales App',
            'email' => 'salesapp@dev.com',
            'password' => bcrypt('123123'),
            'role' => 'subscriber'
        ]);

        App\User::create([
            'name' => 'Sales person',
            'email' => 'sales@dev.com',
            'password' => bcrypt('123123'),
            'role' => 'saler'
        ]);
    }
}
