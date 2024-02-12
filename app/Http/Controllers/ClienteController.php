<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Arquivos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $arquivos = Arquivos::orderByDesc('nome')
            ->where([
                ['cliente_id', $cliente->id]
            ])
            ->get()
        ;

        return view('cliente.edit',[
            'cliente' => $cliente,
            'arquivos' => $arquivos
        ]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'descricao' => $request->descricao
        ]);

        $arquivos = Arquivos::orderByDesc('nome')
            ->where([
                ['cliente_id', $cliente->id]
            ])
            ->get()
        ;

        return view('cliente.edit',[
            'cliente' => $cliente,
            'arquivos' => $arquivos
        ]);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return Redirect::route('dashboard')->with('success', 'Cliente excluido com sucesso!');
    }

    public function createFile(Request $request, Cliente $cliente)
    {
        $nome = $request->arquivo->getClientOriginalName();
        $local = $request->arquivo->storeAs("users", $nome);

        $criarArquivo = array();
        $criarArquivo['nome'] = $nome;
        $criarArquivo['local'] = $local;
        $criarArquivo['cliente_id'] = $request->id_cliente;

        Arquivos::create($criarArquivo);
        $arquivos = Arquivos::orderByDesc('nome')
            ->where([
                ['cliente_id', $request->id_cliente]
            ])
            ->get()
        ;

        return view('cliente.edit', [
            'cliente' => $cliente,
            'arquivos' => $arquivos
        ]);
    }

    public function downloadFile($idArquivo)
    {

        $arquivos = Arquivos::orderByDesc('nome')
            ->where([
                ['id', $idArquivo]
            ])
            ->get()[0]
        ;

        $arquivo = $arquivos->local;

        return Storage::download($arquivo);
    }
}
