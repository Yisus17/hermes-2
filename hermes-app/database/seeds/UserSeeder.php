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
            ['id' => 1, 'name' => 'Administrador'],
            ['id' => 2, 'name' => 'Moderador'],
            ['id' => 3, 'name' => 'Simple']
        );


        $users = array(
            [
                'name' => 'JesusAdmin',
                'email' => 'admin@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '1'
            ],
            [
                'name' => 'JesusModerador',
                'email' => 'moderador@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '2'
            ],
            [
                'name' => 'JesusSimpleUser',
                'email' => 'simple@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '3'
            ],
            [
                'name' => 'JesusAdmin2',
                'email' => 'admin2@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '1'
            ],
            [
                'name' => 'JesusModerador2',
                'email' => 'moderador2@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '2'
            ],
            [
                'name' => 'JesusSimpleUser2',
                'email' => 'simple2@enii.com',
                'password' => Hash::make('jesusjesus'),
                'role_id' => '3'
            ]
        );

        DB::table('roles')->insert($roles);
        DB::table('users')->insert($users);
    }
}
