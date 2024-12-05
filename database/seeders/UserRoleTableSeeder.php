<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserTypes = ['SUPER-ADMIN', 'OFFICE-MANAGER','TECHNICIAN','CUSTOMER'];
        foreach ($UserTypes as $UserType) {
            Role::create(['name' => $UserType]);
        }
    }
}
