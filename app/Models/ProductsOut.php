<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsOut extends Model
{
    use HasFactory;

    protected $table = 'products_out';

    protected $fillable = [
        'stock_cards_id',
        'user_id',
        'output_amount',
        'output_price',
        'total_amount',
        'output_date',
        'description',
    ];

    public function stockCard()
    {
        return $this->belongsTo(StockCards::class, 'stock_cards_id');
    }
    
}
