<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'pedido_id',
        'quantidade'
    ];
}
