<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDahsboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppDahsboard->id,
            'name'      =>  'Access Dashboard',
            'slug'      =>  'app.dashboard'
        ]);

        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Access Role',
            'slug'      =>  'app.roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Create Role',
            'slug'      =>  'app.roles.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Edit Role',
            'slug'      =>  'app.roles.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Delete Role',
            'slug'      =>  'app.roles.delete'
        ]);

        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Access User',
            'slug'      =>  'app.users.index'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Create User',
            'slug'      =>  'app.users.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Edit User',
            'slug'      =>  'app.users.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Delete User',
            'slug'      =>  'app.users.delete'
        ]);

        $moduleAppApplication = Module::updateOrCreate(['name' => 'Application Management']);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Access Application',
            'slug'          =>  'app.applications.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Create Application',
            'slug'          =>  'app.applications.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Edit Application',
            'slug'          =>  'app.applications.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Delete Application',
            'slug'          =>  'app.applications.destroy'
        ]);

        $moduleAppDeal = Module::updateOrCreate(['name' => 'Best Deals Management']);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppDeal->id,
            'name'          =>  'Access Deals',
            'slug'          =>  'app.deals.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppDeal->id,
            'name'          =>  'Create Deals',
            'slug'          =>  'app.deals.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppDeal->id,
            'name'          =>  'Edit Deals',
            'slug'          =>  'app.deals.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppDeal->id,
            'name'          =>  'Delete Deals',
            'slug'          =>  'app.deals.destroy'
        ]);

        $moduleAppServices = Module::updateOrCreate(['name' => 'Services Management']);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Services',
            'slug'          =>  'app.services.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Services',
            'slug'          =>  'app.services.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Services',
            'slug'          =>  'app.services.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Services',
            'slug'          =>  'app.services.destroy'
        ]);

        $moduleAppSliders = Module::updateOrCreate(['name' => 'Slider Access']);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Access Slider',
            'slug'          =>  'app.sliders.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Create Slider',
            'slug'          =>  'app.sliders.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Edit Slider',
            'slug'          =>  'app.sliders.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Delete Slider',
            'slug'          =>  'app.sliders.destroy'
        ]);
    }
}
