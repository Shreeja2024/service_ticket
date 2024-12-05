<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // dummy super admin details
        $superAdminUser = User::create([
            "name" => "admin",
            'email' => "admin@yopmail.com",
            'password' => "12345678"
        ]);
        $superAdminUser->assignRole('SUPER-ADMIN');

        // dummy office managers details
        $managerUser = User::create([
            "name" => "manager",
            'email' => "manager@yopmail.com",
            'password' => "12345678"
        ]);
        $managerUser->assignRole('OFFICE-MANAGERS');

        // dummy technicians details
        $technicianUser = User::create([
            "name" => "technician",
            'email' => "technician@yopmail.com",
            'password' => "12345678"
        ]);
        $technicianUser->assignRole('TECHNICIAN');

        // dummy technicians details
        $customerUser = User::create([
            "name" => "customer",
            'email' => "customer@yopmail.com",
            'password' => "12345678"
        ]);
        $customerUser->assignRole('CUSTOMER');


    }
}
