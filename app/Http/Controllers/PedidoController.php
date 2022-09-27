<?php

namespace App\Http\Controllers;

use App\Models\PedidosItems;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    //
    public function index(Request $request)
    {
        return Pedido::find('cliente_id', 1)->itens();
    }

    public function store(Request $request)
    {
    }

    public function addItemsToPedido(Pedido $pedido, array $fields)
    {
        $pedido->itens()->detach();

        foreach ($fields['items'] as $key => $value) {
            PedidosItems::create([
                'pedido_id' => $pedido->id,
                'item_id' => $value['id'],
                'quantidade' => $value['quantidade']
            ]);
        }
    }

    public function register(Request $request)
    {
        $pedido = Pedido::create(['cliente_id' => 1]);

        error_log('pre validate');

        $request->validate([
            'items.*.id' => 'required',
            'items.*.quantidade' => 'required'
        ]);

        error_log('post validate');

        $fields = $request->all();

        $this->addItemsToPedido($pedido, $fields);
    }

    public function edit(Request $request, $id)
    {
        $pedido = Pedido::findOrfail($id);

        $request->validate([
            'items.*.id' => 'required',
            'items.*.quantidade' => 'required'
        ]);

        $fields = $request->all();

        $this->addItemsToPedido($pedido, $fields);
    }
}
