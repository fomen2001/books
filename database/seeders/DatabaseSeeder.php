<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    /**
     * List of applications to add.
     */
    private $permissions = [
        'role-list',
        'role-create',
        'role-view',
        'role-edit',
        'role-delete',

        'user-list',
        'user-create',
        'user-edit',
        'user-view',
        'user-delete',

        'books-list',
        'books-create',
        'books-edit',
        'books-view',
        'books-delete',

        'cart-list',
        'cart-create',
        'cart-delete',

        'checkout-list',

        'sales-list'
    ];


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $user = User::create([
            'name' => 'Fomena',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}