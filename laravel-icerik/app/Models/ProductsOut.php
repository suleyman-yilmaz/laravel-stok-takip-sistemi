<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsOut extends Model
{
    protected $table = 'vw_products_out';

    protected $fillable = [
        'stock_cards_id',
        'output_amount',
        'output_price',
        'total_amount',
        'output_date',
        'description',
        'created_at',
        'updated_at',
    ];
}
