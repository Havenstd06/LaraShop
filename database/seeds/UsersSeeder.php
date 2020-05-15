<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Havens',
            'email' => 'me@hvs.cx',
            'password' => bcrypt('BigBadBoobies6@LesGrandBoobsDu13'),
        ]);
    }
}
