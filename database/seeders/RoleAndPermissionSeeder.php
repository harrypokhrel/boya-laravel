<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'create-activity-posts']);
        Permission::create(['name' => 'edit-activity-posts']);
        Permission::create(['name' => 'delete-activity-posts']);

        $adminRole = Role::create(['name' => 'Admin']);
        $activityOwnerRole = Role::create(['name' => 'Activity Owner']);
        $customer = Role::create(['name' => 'Customer']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-activity-posts',
            'edit-activity-posts',
            'delete-activity-posts',
        ]);

        $activityOwnerRole->givePermissionTo([
            'create-activity-posts',
            'edit-activity-posts',
            'delete-activity-posts',
        ]);
    }
}
