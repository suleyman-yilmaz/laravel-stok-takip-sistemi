<?php

namespace Database\Factories;

use App\Models\StockCards;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockCardsFactory extends Factory
{
    protected $model = StockCards::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement([1, 2]),
            'product_name' => $this->faker->word(),
            'unit' => 'AD',
            'status' => 1,
        ];
    }
}
