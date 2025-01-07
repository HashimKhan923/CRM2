<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating roles
        Role::create([
            'name' => 'admin',
        ]);
    
        Role::create([
            'name' => 'user',
        ]);
    
        // Creating users
        // User::create([
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123'),
        //     'role_id' => 1,
        // ]);
    
        // User::create([
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('user123'),
        //     'role_id' => 2,
        // ]);
    }
    
}
