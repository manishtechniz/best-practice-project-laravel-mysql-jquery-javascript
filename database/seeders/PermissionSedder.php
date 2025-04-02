<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;

class PermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // update and create permissions
        foreach ([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20] as $value) {
            Permission::updateOrCreate(
                ['name' => 'php:'. $value],
                ['guard_name' => 'web']
            );
        }
    }
}
