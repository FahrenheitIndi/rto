<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        /**
        $administrator = Role::where('slug', 'administrator')->first();
        $manageUsers = Permission::where('slug', 'manage.users')->first();
        $manageSettings = Permission::where('slug', 'manage.settings')->first();
        $createUser = Permission::where('slug', 'create.user')->first();
        $updateUser = Permission::where('slug', 'update.user')->first();
        $deleteUser = Permission::where('slug', 'delete.user')->first();

        $adminUser = User::where('id', 1)->first();
        $adminUser->roles()->attach($administrator);
        $adminUser->permissions()->attach($manageUsers);
        $adminUser->permissions()->attach($manageSettings);
        $adminUser->permissions()->attach($createUser);
        $adminUser->permissions()->attach($updateUser);
        $adminUser->permissions()->attach($deleteUser);
         **/
    }
}
