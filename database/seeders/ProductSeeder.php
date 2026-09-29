<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Alcohol;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {

        $alcohols = Alcohol::all();

        foreach ($alcohols as $alcohol) {

            Product::create([
                'name' => $alcohol->name . ' termék 1',
                'price' => '1000',
                'alcohol_id' => $alcohol->id,
            ]);

            Product::create([
                'name' => $alcohol->name . ' termék 2',
                'price' => '2000',
                'alcohol_id' => $alcohol->id,
            ]);
        }
    }
}