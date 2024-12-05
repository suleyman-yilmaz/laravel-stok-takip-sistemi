<?php

namespace Database\Factories;

use App\Models\ProductsOut;
use App\Models\StockCards;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsOutFactory extends Factory
{
    protected $model = ProductsOut::class;

    public function definition()
    {
        return [
            'stock_cards_id' => StockCards::inRandomOrder()->first()->id ?? StockCards::factory(),
            'user_id' => $this->faker->randomElement([1, 2]),
            'output_amount' => $this->faker->numberBetween(1, 100),
            'output_price' => $this->faker->randomFloat(2, 1, 100),
            'total_amount' => $this->faker->randomFloat(2, 1, 1000),
            'output_date' => $this->faker->date(),
            'description' => $this->faker->sentence(),
        ];
    }
}
