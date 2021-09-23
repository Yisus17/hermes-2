<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            ['id' => 1,'name' => 'Administrador'],
            ['id' => 2,'name' => 'Moderador'],
            ['id' => 3,'name' => 'Simple']);


        $userAdmin = array([
            'name' => 'Jesus',
            'email' => 'jesus@enii.com',
            'password' => Hash::make('jesusjesus'),
            'role_id' => '1'
        ]);
        DB::table('roles')->insert($roles);
        DB::table('users')->insert($userAdmin);
    }
}
