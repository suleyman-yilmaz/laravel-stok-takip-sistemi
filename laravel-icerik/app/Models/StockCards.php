<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCards extends Model
{
    // Veritabanı tablolarını tanımlayın
    protected $table = 'stock_cards'; // Tablo adı

    // Atanabilir alanları belirtin
    protected $fillable = [
        'id',
        'product_name',
        'unit',
        'status',
        'created_at',
        'updated_at',
    ];
}
