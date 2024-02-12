<x-app-layout>

    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar cliente') }}
        </h4>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="p-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Atualizar informações do cliente</h2>

                <form action="{{route('cliente.update', ['cliente' => $cliente->id])}}" method="POST" class="p-6 col s12">
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
                            <button class="waves-effect waves-light btn" type="submit" value="Submit"><i class="small material-icons left">contacts</i>Atualizar</button>
                        </div>
                    </div>
                </form>
                <h2 class="p-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Controle dos documentos</h2>
                <div>
                    <h6>Exibir os documentos e dar possibilidade e inserção</h6>

                    <form action="{{route('cliente.createFile', ['cliente' => $cliente->id])}}" method="POST" enctype="multipart/form-data" class="p-6 col s12">
                        <div class="row formModal">
                            @csrf
                            <div class="row">
                                <div class="">
                                    <i class="material-icons prefix">assignment</i>
                                    <label for="nome">Arquivo</label>
                                </div>
                                <div class="">
                                    <input id="arquivo" name="arquivo" type="file" class="validate" required>
                                    <input name="id_cliente" type="hidden" value="{{$cliente->id}}">
                                </div>
                            </div>
                
                            <div class="row">
                                <button class="waves-effect waves-light btn" type="submit" value="Submit"><i class="small material-icons left">contacts</i>Inserir arquivo</button>
                            </div>
                        </div>
                    </form>

                    <div class="tabelaDeClientes">
                        <table class="striped">
                            <thead>
                                <tr>
                                    <th>Opção</th>
                                    <th>Nome</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($arquivos as $arquivo)
                                    <tr>
                                        <td>    
                                            <a href="{{route('cliente.downloadFile', ['cliente' => $arquivo->id])}}" target="_blanck" class="waves-effect waves-light btn orange lighten-1"><i class="tiny material-icons left">border_color</i>Abrir</a>
                                        </td>
                                        <td>{{$arquivo->nome}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>