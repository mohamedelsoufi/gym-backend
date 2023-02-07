<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate([
            'name' => 'super_admin',
            'display_name' => 'super admin',
            'description' => 'has all permissions',
            'is_super' => 1,
        ]);

        foreach (\config('laratrust_seeder.roles') as $key => $values){
            foreach ($values as $value){
                 Permission::updateOrCreate([
                    'name' => $value . '-' . $key,
                    'display_name' => $value . ' ' . $key,
                    'description' => $value . ' ' . $key,
                ]);

            }
        }
        $permissions = Permission::all();
        $role->syncPermissions($permissions);

    }
}
