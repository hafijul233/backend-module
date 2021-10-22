<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Backend\Models\Authorization\Permission;
use Modules\Backend\Models\Authorization\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //get all Routes
        $roles = Role::all();
        $permissions = Permission::all()->pluck('id');

        foreach ($roles as $role) {
            try {
                $role->permissions()->attach($permissions);
            } catch (\PDOException  $exception) {
                throw new \PDOException($exception->getMessage());
            }
        }
    }
}
