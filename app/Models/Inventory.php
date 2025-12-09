<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'current_stock',
        'reserved_stock',
        'available_stock',
        'reorder_level',
        'max_stock_level',
        'location',
        'notes',
        'last_updated_at',
    ];

    protected $casts = [
        'current_stock' => 'integer',
        'reserved_stock' => 'integer',
        'available_stock' => 'integer',
        'reorder_level' => 'integer',
        'max_stock_level' => 'integer',
        'last_updated_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getStockStatusAttribute()
    {
        if ($this->available_stock <= 0) {
            return 'out_of_stock';
        } elseif ($this->available_stock <= $this->reorder_level) {
            return 'low_stock';
        } else {
            return 'in_stock';
        }
    }

    public function getStockStatusColorAttribute()
    {
        return match($this->stock_status) {
            'in_stock' => 'green',
            'low_stock' => 'yellow',
            'out_of_stock' => 'red',
            default => 'gray',
        };
    }
}