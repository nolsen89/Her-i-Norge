<?php

namespace Database\Seeders;


use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // USER MODEL
        $userPermission1 = Permission::create(['name' => 'create:user', 'description' => 'create user']);
        $userPermission2 = Permission::create(['name' => 'read:user', 'description' => 'read user']);
        $userPermission3 = Permission::create(['name' => 'update:user', 'description' => 'update user']);
        $userPermission4 = Permission::create(['name' => 'delete:user', 'description' => 'delete user']);

        // https://www.youtube.com/watch?v=feYE2d4j9so&t=2s 12:15

        // ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'create:role', 'description' => 'create role']);
        $rolePermission2 = Permission::create(['name' => 'read:role', 'description' => 'read role']);
        $rolePermission3 = Permission::create(['name' => 'update:role', 'description' => 'update role']);
        $rolePermission4 = Permission::create(['name' => 'delete:role', 'description' => 'delete role']);

        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'create:permission', 'description' => 'create permission']);
        $permission2 = Permission::create(['name' => 'read:permission', 'description' => 'read permission']);
        $permission3 = Permission::create(['name' => 'update:permission', 'description' => 'update permission']);
        $permission4 = Permission::create(['name' => 'delete:permission', 'description' => 'delete permission']);

        // ADMIN MODEL
        $adminPermission1 = Permission::create(['name' => 'read:admin', 'description' => 'read admin']);
        $adminPermission2 = Permission::create(['name' => 'update:admin', 'description' => 'update admin']);
        
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $moderatorRole = Role::create(['name' => 'moderator']);
        $developerRole = Role::create(['name' => 'developer']);
        $userRole = Role::create(['name' => 'user']);

        $superAdminRole->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission2,
            $userPermission2,
            $rolePermission1,
            $rolePermission1,
            $rolePermission1,
            $rolePermission1,
            $permission1,
            $permission1,
            $permission1,
            $permission1,
            $adminPermission1,
            $adminPermission1,
        ]);

        $adminRole->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission2,
            $userPermission2,
            $rolePermission1,
            $rolePermission1,
            $rolePermission1,
            $rolePermission1,
            $permission1,
            $permission1,
            $permission1,
            $permission1,
            $adminPermission1,
            $adminPermission1,
        ]);

        $moderatorRole->syncPermissions([
            $userPermission2,
            $rolePermission2,
            $permission2,
            $adminPermission1,
        ]);

        $developerRole->syncPermissions([
            $adminPermission1,
        ]);

        $superAdmin = User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'mail@loggs.no',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        $admin = User::create([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@loggs.no',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        $moderator = User::create([
            'name' => 'moderator',
            'is_admin' => 1,
            'email' => 'moderator@loggs.no',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        $developer = User::create([
            'name' => 'developer',
            'is_admin' => 1,
            'email' => 'developer@loggs.no',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'name' => 'robot',
            'is_admin' => 0,
            'email' => 'robot@loggs.no',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        $superAdmin->syncRoles([$superAdminRole]);

        $admin->syncRoles([$adminRole]);

        $moderator->syncRoles($moderatorRole);

        $developer->syncRoles($developerRole);

        $user->syncRoles($userRole);
    }
}
