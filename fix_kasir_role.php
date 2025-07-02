<?php
// Jalankan file ini dengan: php artisan tinker --execute="require 'fix_kasir_role.php';"

use App\Models\User;
use Spatie\Permission\Models\Role;

$kasir = User::where('email', 'kasir@cafe.com')->first();
$kasirRole = Role::where('name', 'kasir')->first();

if ($kasir && $kasirRole) {
    // Hapus semua role user kasir
    $kasir->syncRoles([$kasirRole->name]);
    echo "Role user kasir berhasil di-set hanya sebagai kasir.\n";
} else {
    echo "User kasir atau role kasir tidak ditemukan.\n";
}
