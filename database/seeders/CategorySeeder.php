<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cats = [
            [
                'category_name' => 'Representation',
                'category_description' => 'Expenses for seminars, trainings, meetings, conventions, etc.',
                'type' => 'opex'
            ],
            [
                'category_name' => 'Supplies',
                'category_description' => 'For office supplies and other consumables',
                'type' => 'opex'
            ],
            [
                'category_name' => 'Licenses (Software)',
                'category_description' => 'For all software licenses',
                'type' => 'opex'
            ],
            [
                'category_name' => 'Subscriptions',
                'category_description' => 'For all subscriptions of any form',
                'type' => 'opex'
            ],
            [
                'category_name' => 'Equipment & Facilities',
                'category_description' => 'For equipment, facilities and other furnitures & fixtures',
                'type' => 'capex'
            ],
        ];

        foreach($cats as $cat) {
            Category::create($cat);
        }
    }
}
