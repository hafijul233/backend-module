<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Modules\Backend\Models\Authorization\Permission;
use Modules\Backend\Supports\Helper;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //disable Observer
        $eventDispatcher = Permission::getEventDispatcher();
        Permission::unsetEventDispatcher();
        //get all routes
        $routes = array_keys(Route::getRoutes()->getRoutesByName());

        foreach ($routes as $route) {
            try {
                Permission::create(['display_name' => Helper::permissionDisplay($route), 'name' => $route, 'guard_name' => 'web', 'enabled' => 'yes']);
            } catch (\PDOException $exception) {
                throw new \PDOException($exception->getMessage());
            }
        }
        //Enable Observer
        Permission::setEventDispatcher($eventDispatcher);
    }
}
