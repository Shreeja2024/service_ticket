<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Manage Manager',
            'Create Manager',
            'Edit Manager',
            'Delete Manager',
            'Manage Orders',
            'Manage Customer',
            'Create Customer',
            'Edit Customer',
            'Delete Customer',
            'Manage Role',
            'Edit Role',
            'Manage Report',
            'Manage Content',
            'Manage Technician',
            'Create Technician',
            'Edit Technician',
            'Delete Technician',
        ];
         
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // super admin all permission
        $superAdminRole = Role::where('name','SUPER-ADMIN')->first();
        $superAdminRole->syncPermissions(Permission::all());

        // office manager permission
        $officeManagerRole = Role::where('name','OFFICE-MANAGER')->first();
        $officeManagerRole->syncPermissions([
            'Manage Technician',
            'Create Technician',
            'Edit Technician',
            'Delete Technician',
        ]);
    }
}
