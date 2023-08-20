<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\ProcurementPlan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);

        $u = User::first();
        $u->assignRole('admin');
        $u->assignRole('budget-officer');

        $arts = User::create([
            'full_name' => 'Artemio M. Gulilat',
            'user_name' => 'arthyms',
            'password' => bcrypt('pass')
        ]);

        $fines = User::create([
            'full_name' => 'Josefina J. Pangan',
            'user_name' => 'fina',
            'password' => bcrypt('pass')
        ]);

        $arts->assignRole('office-head');
        $fines->assignRole('office-head');

        Department::create([
            'name' => 'Systems Administration & Development',
            'threshold' => 900000,
            'user_id' => 1
        ]);

        Department::create([
            'name' => 'Finance Office',
            'threshold' => 2900000,
            'user_id' => 2
        ]);

        Department::create([
            'name' => 'Human Resources Management',
            'threshold' => 450000,
            'user_id' => 3
        ]);

        Department::create([
            'name' => 'College of Arts, Sciences, & Technology',
            'threshold' => 1450000,
            'user_id' => 3
        ]);

        ProcurementPlan::create([
            'title' => 'Annual Budget CY 2024',
            'year' => 2024,
            'prep_start' => '2023-08-20',
            'prep_end' => '2023-10-31',
            'active' => 1
        ]);



    }
}
