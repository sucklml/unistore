<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userA = User::create([
            'name' => 'Arnold Fernandez',
            'email' => 'arnoldferb@gmail.com',
            'password' => bcrypt('123456789'),
            'dni' => '75452541'
        ]);
        $userM = User::create([
            'name' => 'Alejandra Fernandez',
            'email' => 'alejandra@gmail.com',
            'password' => bcrypt('11111111'),
            'dni' => '12458756'
        ]);
        $userU = User::create([
            'name' => 'Jose Arias',
            'email' => 'prosor@gmail.com',
            'password' => bcrypt('22222222'),
            'dni' => '36265412'
        ]);
        $userA -> assignRole('admin');
        $userM -> assignRole('mantenedor');
        $userU -> assignRole('user');
    }
}
