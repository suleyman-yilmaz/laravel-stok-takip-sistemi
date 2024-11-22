<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsIn extends Model
{
    protected $table = 'view_products_in';

    protected $fillable = [
        'stock_cards_id',
        'user_id',
        'input_amount',
        'entry_price',
        'total_amount',
        'input_date',
        'description',
        'created_at',
        'updated_at',
    ];
}
