<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id'
    ];

    public function itens()
    {
        return $this->belongsToMany(
            Item::class,
            'pedidos_items',
            'pedido_id',
            'item_id'
        );
    }
}
