<?php

namespace Database\Seeders;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CsvtoArray;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;
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

        $now = Carbon::now();
        $file = __DIR__ . '\..\..\vendor\laravolt\indonesia\resources\csv\provinces.csv';
        $header = ['code', 'name', 'lat', 'long'];
        $data = $this->csv_to_array($file, $header);
        $provinsi = array_map(function ($arr) use ($now) {
            Provinsi::updateOrCreate([
                'id_provinsi' => (int)$arr['code'],
            ], [
                'nama_provinsi' => $arr['name'],
                'id_provinsi' => (int)$arr['code'],
            ]);
        }, $data);
        $file = __DIR__ . '\..\..\vendor\laravolt\indonesia\resources\csv\cities.csv';
        $header = ['id','province', 'name', 'lat', 'long'];
        $data = $this->csv_to_array($file, $header);
        $provinsi = array_map(function ($arr) use ($now) {
            KabupatenKota::updateOrCreate([
                'id_kabupaten_kota' => (int)$arr['id'],
            ], [
                'nama_kabupaten' => $arr['name'],
                'provinsi_id' => (int)$arr['province'],
            ]);
        }, $data);

    }

    private function csv_to_array($filename, $header)
    {
        $delimiter = ',';
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;

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
