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
            'nama_lengkap' => 'adminer',
            'nip' => '9988771DY',
            'email' => 'adminer@gmail.com',
            'password' => bcrypt('adminer'),
        ]);
    }
}
