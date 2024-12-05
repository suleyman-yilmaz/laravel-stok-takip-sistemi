<?php

namespace Database\Factories;

use App\Models\ProductsIn;
use App\Models\StockCards;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsInFactory extends Factory
{
    protected $model = ProductsIn::class;

    public function definition()
    {
        return [
            'stock_cards_id' => StockCards::inRandomOrder()->first()->id ?? StockCards::factory(),
            'user_id' => $this->faker->randomElement([1, 2]),
            'input_amount' => $this->faker->numberBetween(1, 100),
            'entry_price' => $this->faker->randomFloat(2, 1, 100),
            'total_amount' => $this->faker->randomFloat(2, 1, 1000),
            'input_date' => $this->faker->date(),
            'description' => $this->faker->sentence(),
        ];
    }
}
