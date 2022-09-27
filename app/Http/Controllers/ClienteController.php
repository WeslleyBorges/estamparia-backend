<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:clientes',
            'password' => 'required|string|confirmed'
        ]);


        $cliente = Cliente::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $cliente->createToken('myapptoken')->plainTextToken;

        $response = [
            'cliente' => $cliente,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        // auth()->user()->currentAccessToken()->logout();
        // Log::info(print_r(auth()->user(), true));

        Auth::logout();

        return [
            'message' => 'Logged out'
        ];
    }
}
