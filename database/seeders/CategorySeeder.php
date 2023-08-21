<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
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
                'type' => 'opex',
                'items' => [
                    [
                        'item_name' =>'National Convention',
                        'item_description' => 'Conventions within the national level',
                        'unit' => 'representations',
                        'regular_price' => 8000
                    ],
                    [
                        'item_name' =>'Regional Convention',
                        'item_description' => 'Conventions within the regional level',
                        'unit' => 'representations',
                        'regular_price' => 5000
                    ],
                    [
                        'item_name' =>'Seminar/Workshop',
                        'item_description' => 'Seminars and Workshops attended by an employee within the department or office',
                        'unit' => 'representations',
                        'regular_price' => 2000
                    ],
                ]
            ],
            [
                'category_name' => 'Supplies',
                'category_description' => 'For office supplies and other consumables',
                'type' => 'opex',
                'items' => [
                    [
                        'item_name' => 'Long bond paper',
                        'item_description' => 'Bond paper 8.5x13 inches',
                        'unit' => 'rims',
                        'regular_price' => 200,
                    ],
                    [
                        'item_name' => 'Long-size brown envelop',
                        'item_description' => 'Long sized brown envelop',
                        'unit' => 'pieces',
                        'regular_price' => 5,
                    ]
                ]
            ],
            [
                'category_name' => 'Licenses (Software)',
                'category_description' => 'For all software licenses',
                'type' => 'opex',
                'items' => [
                    [
                        'item_name' => 'Windows 11',
                        'item_description' => 'Windows 11 OS License',
                        'unit' => 'licenses',
                        'regular_price' => 8000,
                    ],
                    [
                        'item_name' => 'MS Office 360',
                        'item_description' => 'MS Office 360 with publisher',
                        'unit' => 'licenses',
                        'regular_price' => 9500,
                    ]
                ]
            ],
            [
                'category_name' => 'Subscriptions',
                'category_description' => 'For all subscriptions of any form',
                'type' => 'opex',
                'items' => [
                    [
                        'item_name' => 'Time Magazine',
                        'item_description' => 'The Time Magazine monthly subscription',
                        'unit' => 'subscriptions',
                        'regular_price' => 200,
                    ]
                ]
            ],
            [
                'category_name' => 'Equipment & Facilities',
                'category_description' => 'For equipment, facilities and other furnitures & fixtures',
                'type' => 'capex',
                'items' => [
                    [
                        'item_name' => 'Steel Filing Cabinet',
                        'item_description' => '4-drawer steel filing cabinet with keys',
                        'unit' => 'units',
                        'regular_price' => 2300,
                    ],
                    [
                        'item_name' => 'i5 Desktop Computer',
                        'item_description' => 'Core i5 Desktop computer with monitor, mouse, and keyboard',
                        'unit' => 'units',
                        'regular_price' => 28000,
                    ]
                ]
            ],
        ];

        foreach($cats as $cat) {
            $items = $cat['items'];
            $c = Category::create([
                'category_name' => $cat['category_name'],
                'category_description' => $cat['category_description'],
                'type' => $cat['type']
            ]);

            foreach($items as $item) {
                $c->items()->create($item);
            }
        }
    }
}
