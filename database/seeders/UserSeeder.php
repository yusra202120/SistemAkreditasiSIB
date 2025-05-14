<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        UserModel::create([
            'username' => 'admin',
            'nama' => 'Administrator',
            'level_id' => 1, 
            'password' => Hash::make('admin123'),
        ]);
    }
}
