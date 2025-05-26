<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->info('Creating admin user...');
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'email' => 'admin@gmail.com',
                'name' => 'Admin',
                'password' => bcrypt('password'), // Change this to a secure password
            ]
        );
        $this->info('Admin user created.');


        // Create Admin Role
        $this->info('Creating Admin role...');
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $this->info('Admin role created.');

        $this->info('Loading permissions from nav.php...');
        // Load permissions from nav.php
        $navConfig = config('nav');
        $permissions = $this->extractPermissions($navConfig);

        $this->info('Permissions loaded.');

        $this->info('Creating permissions and assigning them to the Admin role...');
        // Create Permissions and Assign to Role
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            $adminRole->givePermissionTo($permission);
        }

        $this->info('Permissions created and assigned to the Admin role.');

        $this->info('Assigning Admin role to the admin user...');
        // Assign Role to Admin User
        $admin->assignRole($adminRole);
        $this->info('Admin role assigned to the admin user.');

    }

    private function extractPermissions(array $navConfig): array
    {
        $permissions = [];

        foreach ($navConfig as $item) {
            if (isset($item['can'])) {
                $permissions[] = $item['can'];
            }

            if (isset($item['child']) && is_array($item['child'])) {
                $permissions = array_merge($permissions, $this->extractPermissions($item['child']));
            }
        }

        return array_unique($permissions);
    }

    private function info(string $string)
    {
        $this->command->info($string);
    }
}
