<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(['name'=>'Fabio Fapeli','email'=>'fabio.fapeli@gmail.com','password'=>bcrypt('123456'),'is_admin'=>1]);
        Factory(User::class,5)->create();
    }
}
