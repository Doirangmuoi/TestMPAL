<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSale extends Model
{
    use HasFactory;

    protected $table = 'item_sales';

    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'expired_date',
        'note',
    ];

    protected $casts = [
        'expired_date' => 'date',
    ];
}
