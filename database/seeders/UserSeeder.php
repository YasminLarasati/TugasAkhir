<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;


class UserSeeder extends Seeder
{
    public function run()
{
    \App\Models\Role::insert([
        ['name' => 'admin'],
        ['name' => 'tim'],
        ['name' => 'kepala'],
    ]);

    \App\Models\User::create([
        'name' => 'admin',
        'email' => 'admin@dinamika.ac.id',
        'password' => Hash::make('admin123'),
        'role_id' => 1
    ]);

    \App\Models\User::create([
        'name' => 'tim',
        'email' => 'tim@dinamika.ac.id',
        'password' => Hash::make('tim123'),
        'role_id' => 2
    ]);

    
    \App\Models\User::create([
        'name' => 'kepala',
        'email' => 'kepalaPerpus@dinamika.ac.ic',
        'password' => Hash::make('kepalaPerpus123'),
        'role_id' => 3
    ]);
}
}
