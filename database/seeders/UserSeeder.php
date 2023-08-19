<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'username' =>  'admin',
            'email' => 'admin@gmail.com',
            'roles' => 'ADMIN',
            'password' => Hash::make('admin')
        ]);

        $user = User::create([
            'name' => 'Rizky Perdana Nst',
            'username' =>  'rizkyperdananst',
            'email' => 'rizkyperdananst@gmail.com',
            'roles' => 'USER',
            'password' => Hash::make('admin')
        ]);
    }
}
