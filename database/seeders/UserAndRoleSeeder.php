<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserAndRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $kasirRole = Role::firstOrCreate(['name' => 'kasir']);
        $pemilikRole = Role::firstOrCreate(['name' => 'pemilik']);

        // Admin
        $admin = User::firstOrCreate([
            'email' => 'admin@cafe.com',
        ], [
            'name' => 'Admin Cafe',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        // Kasir
        $kasir = User::firstOrCreate([
            'email' => 'kasir@cafe.com',
        ], [
            'name' => 'Kasir Cafe',
            'password' => Hash::make('password'),
        ]);
        $kasir->assignRole($kasirRole);

        // Pemilik
        $pemilik = User::firstOrCreate([
            'email' => 'pemilik@cafe.com',
        ], [
            'name' => 'Pemilik Cafe',
            'password' => Hash::make('password'),
        ]);
        $pemilik->assignRole($pemilikRole);
    }
}
