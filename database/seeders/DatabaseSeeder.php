<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StockCards;
use App\Models\ProductsIn;
use App\Models\ProductsOut;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        StockCards::factory(75)->create()->each(function ($stockCard) {
            ProductsIn::factory(75)->create(['stock_cards_id' => $stockCard->id]);
            ProductsOut::factory(75)->create(['stock_cards_id' => $stockCard->id]);
        });
    }
}
