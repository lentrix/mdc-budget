<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'user_name'=>'lentrix',
            'full_Name'=>'Benjie B. Lenteria',
            'password'=>bcrypt('pass')
        ]);
    }
}
