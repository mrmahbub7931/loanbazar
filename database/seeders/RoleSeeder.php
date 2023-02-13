<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermission = Permission::all();
        Role::updateOrCreate([
            'name'      => 'Super Admin',
            'slug'      => 'super-admin',
            'deletable' => false,
        ])->permissions()->sync($adminPermission->pluck('id'));

        Role::updateOrCreate([
            'name' => 'User',
            'slug' => 'user',
            'deletable' => false,
        ]);
    }
}
