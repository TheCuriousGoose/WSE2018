<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PreOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'status',
        'remarks'
    ];

    public function preOrderItems(): HasMany
    {
        return $this->hasMany(PreOrderItem::class);
    }
}
