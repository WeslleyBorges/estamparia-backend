<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [ClienteController::class, 'register']);
Route::get('pedidos', [PedidoController::class, 'index']);
Route::post('pedidos/register', [PedidoController::class, 'register']);
Route::post('pedidos/edit/{id}', [PedidoController::class, 'edit']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('logout', [ClienteController::class, 'logout']);
});
