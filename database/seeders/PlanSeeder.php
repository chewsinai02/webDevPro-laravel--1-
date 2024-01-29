<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'title' => 'Monthly',
            'slug' => 'monthly',
            'price' => '10',
            'abbreviation' => '/monthly',
            'description' => 'Some benefit',
            'stripe_id' => 'price_1OWLT3KVP0IkqNbg3fOvt9dZ',
        ]);
    }
}
