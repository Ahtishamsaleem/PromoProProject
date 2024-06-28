<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions if they do not exist
        Permission::firstOrCreate(['name' => 'Add']);
        Permission::firstOrCreate(['name' => 'View']);
        Permission::firstOrCreate(['name' => 'Update']);
        Permission::firstOrCreate(['name' => 'Delete']);

        // Create roles and assign created permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->syncPermissions(['View', 'Update', 'Delete']);

        $manufacturerRole = Role::firstOrCreate(['name' => 'Manufacturer']);
        $manufacturerRole->syncPermissions(['View', 'Update', 'Delete']);

        // Assign roles to users based on user_designation_id
        $adminUsers = User::where('user_designation_id', 1)->get();
        foreach ($adminUsers as $user) {
            $user->assignRole($adminRole);
        }

        $manufacturerUsers = User::where('user_designation_id', 2)->get();
        foreach ($manufacturerUsers as $user) {
            $user->assignRole($manufacturerRole);
        }
    }
}
