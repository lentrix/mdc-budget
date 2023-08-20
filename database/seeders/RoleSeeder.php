<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=>'admin']);
        //admin permissions
        $registerUser = Permission::create(['name'=>'register-user']);
        $replacePassword = Permission::create(['name'=>'replace-password']);
        $updateUser = Permission::create(['name'=>'update-user']);
        $deactivateUser = Permission::create(['name'=>'deactivate-user']);

        $admin->givePermissionTo($registerUser);
        $admin->givePermissionTo($replacePassword);
        $admin->givePermissionTo($updateUser);
        $admin->givePermissionTo($deactivateUser);

        $budgetOfficer = Role::create(['name'=>'budget-officer']);
        //budget officer permissions
        $createApp = Permission::create(['name'=>'create-app']);
        $reviewBudget = Permission::create(['name'=>'review-budget']);
        $manageItems = Permission::create(['name'=>'manage-items']);
        $manageDepartments = Permission::create(['name'=>'manage-departments']);

        $budgetOfficer->givePermissionTo($createApp);
        $budgetOfficer->givePermissionTo($reviewBudget);
        $budgetOfficer->givePermissionTo($manageItems);
        $budgetOfficer->givePermissionTo($manageDepartments);

        $head = Role::create(['name'=>'office-head']);
        $manageBudget = Permission::create(['name'=>'manage-budget']);

        $head->givePermissionTo($manageBudget);

        $updateProfile = Permission::create(['name'=>'update-profile']);
        $admin->givePermissionTo($updateProfile);
        $head->givePermissionTo($updateProfile);
        $budgetOfficer->givePermissionTo($updateProfile);

        $admin->givePermissionTo('manage-budget');
        $head->givePermissionTo('manage-budget');

    }
}
