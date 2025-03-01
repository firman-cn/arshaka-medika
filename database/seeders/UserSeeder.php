<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     
    public function run(): void
    {
        //
        $superadminRole = Role::where('name', 'superadmin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $memberRole= Role::where ('name','member')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole($adminRole);

        // Buat User Biasa
        $user = User::create([
            'name' => 'Super  Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole($superadminRole);

        $user = User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole($memberRole);
    }
}
