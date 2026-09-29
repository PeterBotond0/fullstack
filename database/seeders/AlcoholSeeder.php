<?php

namespace Database\Seeders;

use App\Models\Alcohol;
use Illuminate\Database\Seeder;

class AlcoholSeeder extends Seeder
{
    const ALCOHOLS = [
        'Sör',
        'Bor',
        'Pálinka',
        'Gin',
        'Vodka',
        'Whiskey',
    ];

    public function run(): void
    {
        foreach (self::ALCOHOLS as $name) {
            Alcohol::create([
                'name' => $name,
            ]);
        }
    }
}