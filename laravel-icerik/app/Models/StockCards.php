<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCards extends Model
{
    // Veritabanı tablolarını tanımlayın
    protected $table = 'stock_cards'; // Tablo adı

    // Atanabilir alanları belirtin
    protected $fillable = [
        'product_name',
        'unit',
        'status',
        'created_at',
        'updated_at',
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
