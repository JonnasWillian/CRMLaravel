<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="p-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Clientes</h2>

                <!-- Botão do modal -->
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="small material-icons left">account_box</i>Cadastrar cliente</a>

                <!-- Modal de cadastro de usuários -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Cadastro de clientes</h4>
                        <p>Preencha o formulário corretamente conforme os dados do cliente</p>

                        <form action="{{route('cliente.create')}}" method="POST" class="col s12">
                            <div class="row formModal">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input placeholder="Ex: Jonnas" id="nome" name="nome" type="text" class="validate" required>
                                    <label for="nome">Nome</label>
                                    </div>
                                    <div class="input-field col s6">
                                    <i class="material-icons prefix">mail</i>
                                    <input id="email" type="email" name="email" placeholder="Ex: jonnasnogueira2@gmail.com" class="validate" required>
                                    <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                    <i class="material-icons prefix">phone_android</i>
                                    <input placeholder="Ex: 71997343101" name="telefone" id="telefone" type="number" class="validate" required>
                                    <label for="telefone">Contato</label>
                                    </div>
                                    <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input id="descricao" name="descricao" type="text" placeholder="Ex: Cliente da empresa X para serviço Y" class="validate">
                                    <label for="descricao">Descrição</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <button class="waves-effect waves-light btn" type="submit" value="Submit"><i class="small material-icons left">contacts</i>Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="modal-close waves-effect waves-green btn-flat">Fechar</button>
                    </div>
                </div>

                <div class="tabelaDeClientes">
                    <table class="striped">
                        <thead>
                            <tr>
                                <th>Opção</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Descricao do cliente</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>
                                    <a href="{{route('cliente.edit', ['cliente' => $cliente->id])}}" class="waves-effect waves-light btn orange lighten-1"><i class="tiny material-icons left">border_color</i>Editar</a>
                                    <!-- <form action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="waves-effect waves-light btn red darken-1" type="submit" onClick ="return confirm('Tem certeza que deseja apagar este registro ?')"><i class="tiny material-icons left">cancel</i>Apagar</button>
                                    </form> -->
                                    @include('cliente.modalDelete')
                                    <a href="#delete" class="waves-effect waves-light btn red darken-1 modal-trigger"><i class="tiny material-icons left">cancel</i>Apagar</a>
                                </td>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->telefone}}</td>
                                <td>{{$cliente->descricao}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Clientes") }}
                </div> -->
            </div>
        </div>
    </div>
</x-app-layout>
