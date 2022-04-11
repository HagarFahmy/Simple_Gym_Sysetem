<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $models = [
            'admins', 'roles', 'permissions', 'gymManagers', 'cityManagers', 'users', 'cities', 'gyms', 'trainingPackages', 'trainingSession','coaches', 'attendance', 'buyPackage', 'revenue'
            ];
        $actions = ['list','create', 'update', 'delete'];

        $permissions = [];
        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permission['guard_name'] = 'admin';
                $permission['name'] = $action . '-' . $model;
                $permission['created_at'] = Carbon::now();
                $permission['updated_at'] = Carbon::now();
                array_push($permissions, $permission);
            }
        }
        Permission::insert($permissions);


        // Super admin role
        $superAdminPremissionsModules = ['admins', 'roles', 'permissions', 'gymManagers', 'cityManagers', 
        'users', 'cities', 'gyms', 'trainingPackages', 'trainingSession','coaches', 'buyPackage', 'revenue'];
        $superAdminPremissions = [];
        foreach ($superAdminPremissionsModules as $key => $value) {
            foreach ($actions as $action) {
                $superAdminPremissions[] = $action . '-' . $value;
            }
        }
        $superAdminPremissions[]= 'list-attendance';

        
        $superAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $superAdmin->givePermissionTo($superAdminPremissions);



        // Gym Manager Role
        $gymManagerPremissionsModules = ['trainingSession', 'buyPackage', 'revenue'];
        $gymManagerPremissions = [];
        foreach ($gymManagerPremissionsModules as $key => $value) {
            foreach ($actions as $action) {
                $gymManagerPremissions[] = $action . '-' . $value;
            }
        }
        $gymManagerPremissions[]= 'list-attendance';

        $gymManager = Role::create(['name' => 'Gym Manager', 'guard_name' => 'admin']);
        $gymManager->givePermissionTo($gymManagerPremissions);


        // City Manager Role
        $cityManagerPremissionsModules = ['trainingSession', 'buyPackage', 'revenue', 'gyms', 'gymManagers'];
        $cityManagerPremissions = [];
        foreach ($cityManagerPremissionsModules as $key => $value) {
            foreach ($actions as $action) {
                $cityManagerPremissions[] = $action . '-' . $value;
            }
        }
        $cityManagerPremissions[]= 'list-attendance';

        $cityManager = Role::create(['name' => 'City Manager', 'guard_name' => 'admin']);
        $cityManager->givePermissionTo($cityManagerPremissions);


    }
}
