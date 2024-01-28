<x-app-layout>

    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar cliente') }}
        </h4>
    </x-slot>

    <form action="{{route('cliente.update', ['cliente' => $cliente->id])}}" method="POST" class="col s12">
        <div class="row formModal">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input value="{{old('nome',$cliente->nome)}}" id="nome" name="nome" type="text" class="validate" required>
                <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                <i class="material-icons prefix">mail</i>
                <input id="email" type="email" name="email" value="{{old('email',$cliente->email)}}" class="validate" required>
                <label for="email">Email</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                <i class="material-icons prefix">phone_android</i>
                <input value="{{old('telefone',$cliente->telefone)}}" name="telefone" id="telefone" type="number" class="validate" required>
                <label for="telefone">Contato</label>
                </div>
                <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="descricao" name="descricao" type="text" value="{{old('descricao',$cliente->descricao)}}" class="validate">
                <label for="descricao">Descrição</label>
                </div>
            </div>

            <div class="row">
                <button class="waves-effect waves-light btn" type="submit" value="Submit"><i class="small material-icons left">contacts</i>Cadastrar</button>
            </div>
        </div>
    </form>

</x-app-layout>