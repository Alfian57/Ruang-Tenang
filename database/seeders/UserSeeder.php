<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Alfian Admin',
            'email' => 'alfian@admin.com',
            'password' => 'password',
            'role' => UserRoleEnum::ADMIN->value,
        ]);

        \App\Models\User::create([
            'name' => 'Dery Admin',
            'email' => 'dery@admin.com',
            'password' => 'password',
            'role' => UserRoleEnum::ADMIN->value,
        ]);

        \App\Models\User::create([
            'name' => 'andika Admin',
            'email' => 'andika@admin.com',
            'password' => 'password',
            'role' => UserRoleEnum::ADMIN->value,
        ]);

        \App\Models\User::create([
            'name' => 'Alfian Member',
            'email' => 'alfian@member.com',
            'password' => 'password',
            'role' => UserRoleEnum::MEMBER->value,
        ]);

        \App\Models\User::create([
            'name' => 'Dery Member',
            'email' => 'dery@member.com',
            'password' => 'password',
            'role' => UserRoleEnum::MEMBER->value,
        ]);

        \App\Models\User::create([
            'name' => 'Andika Member',
            'email' => 'andika@member.com',
            'password' => 'password',
            'role' => UserRoleEnum::MEMBER->value,
        ]);
    }
}
