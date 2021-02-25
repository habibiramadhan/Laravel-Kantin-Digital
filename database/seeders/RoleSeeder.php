<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
            
            ]);

        $role = Role::create([
            'name' => 'kasir',
            'guard_name' => 'web'
            
            ]);
    }
}
