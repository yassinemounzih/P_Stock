<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Abderrhim elahmady',
            'is_admin' => '1',
            'email' => 'Abderrhim.elahmady@gmail.com',	
            'password' => bcrypt('abdomaroc7'),
        ]);
    }
}
