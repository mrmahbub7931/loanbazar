<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::updateOrCreate([
            'email' => 'admin@admin.com',
            'phone' => '01234567810',
        ],[
            'role_id'   => Role::where('slug','super-admin')->first()->id,
            'name'      => 'Admin',
            'password' => Hash::make('secret12')
        ]);

        User::updateOrCreate([
            'email' => 'user@gmail.com',
            'phone' => '01234567811',
        ],[
            'role_id'   => Role::where('slug','user')->first()->id,
            'name'      => 'User',
            'password' => Hash::make('secret12')
        ]);

        User::updateOrCreate([
            'email' => 'vendor@vendor.com',
            'phone' => '01234567812',
        ],[
            'role_id'   => Role::where('slug','vendor')->first()->id,
            'name'      => 'Vendor',
            'password' => Hash::make('secret12')
        ]);
    }
}
