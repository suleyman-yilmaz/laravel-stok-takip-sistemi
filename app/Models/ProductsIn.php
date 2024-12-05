<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsIn extends Model
{
    use HasFactory;

    protected $table = 'products_in';

    protected $fillable = [
        'stock_cards_id',
        'user_id',
        'input_amount',
        'entry_price',
        'total_amount',
        'input_date',
        'description',
    ];

    public function stockCard()
    {
        return $this->belongsTo(StockCards::class, 'stock_cards_id');
    }

}
