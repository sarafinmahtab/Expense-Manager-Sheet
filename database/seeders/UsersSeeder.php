<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')
            ->where('email', 'contact@neymarjr.com')
            ->update(['password' => Hash::make('1234')]);

        DB::table('users')    
            ->where('email', 'contact@tsilva.com')
            ->update(['password' => Hash::make('5678')]);

        DB::table('users')
            ->where('email', 'contact@allison-becker.com')
            ->update(['password' => Hash::make('9101112')]);

        DB::table('users')
            ->where('email', 'contact@paqueta.com')
            ->update(['password' => Hash::make('13141516')]);

        DB::table('users')
            ->where('email', 'contact@coutinho.com')
            ->update(['password' => Hash::make('17181920')]);

        // DB::table('users')->insert([
        //     'name' => 'Neymar Jr',
        //     'email' => 'contact@neymarjr.com',
        //     'password' => Hash::make('1234')
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Thiago Silva',
        //     'email' => 'contact@tsilva.com',
        //     'password' => Hash::make('5678')
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Allison Becker',
        //     'email' => 'contact@allison-becker.com',
        //     'password' => Hash::make('9101112')
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Lucas Paqueta',
        //     'email' => 'contact@paqueta.com',
        //     'password' => Hash::make('13141516')
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Phillipe Coutinho',
        //     'email' => 'contact@coutinho.com',
        //     'password' => Hash::make('17181920')
        // ]);
    }
}
