<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pre_order_id',
        'product_id',
        'color_id',
        'design_symbol_id',
        'quantity',
        'price_at_order'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function designSymbol()
    {
        return $this->belongsTo(DesignSymbol::class);
    }
}
