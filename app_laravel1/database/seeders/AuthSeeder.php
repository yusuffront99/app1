<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'adminer123',
            'email' => 'adminer123@gmail.com',
            'password' => bcrypt('adminer123'),
        ]);
    }
}
