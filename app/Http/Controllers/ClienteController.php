<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create(Request $request)
    {
        // Adiciona o ID do usuário que cadastrou o cliente
        $request['user_id'] = $request->user()->id;
        // Cadastra o cliente
        Cliente::create($request->all());

        // Direciona para página inicial
        return Redirect::route('dashboard')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function view(Request $request)
    {
        // Busca os clientes cadastrados pela ordem do último ao primeiro
        $clientes = Cliente::orderByDesc('created_at')->where('user_id', $request->user()->id)->get();
        return view("dashboard", ['clientes' => $clientes]);
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'descricao' => $request->descricao
        ]);

        return Redirect::route('dashboard')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return Redirect::route('dashboard')->with('success', 'Cliente excluido com sucesso!');
    }
}
