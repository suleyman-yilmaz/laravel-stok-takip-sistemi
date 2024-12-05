<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCards extends Model
{
    use HasFactory;

    protected $table = 'stock_cards';

    protected $fillable = [
        'user_id',
        'product_name',
        'unit',
        'satatus',
    ];

    public function productsIn()
    {
        return $this->hasMany(ProductsIn::class, 'stock_cards_id');
    }

    public function productsOut()
    {
        return $this->hasMany(ProductsOut::class, 'stock_cards_id');
    }
}
