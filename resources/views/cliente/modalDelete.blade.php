<div id="delete" class="modal">
    <div class="modal-content">
        <form action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="post">
            @csrf
            @method('delete')
            <div class ="modalDelete">
                <h4>Tem certeza que deseja apagar este registro?</h4>
                <p>Todos os dados referente ao cliente serão apagados.</p>
            </div>
            <button class="waves-effect waves-light btn red darken-1" type="submit"><i class="tiny material-icons left">cancel</i>Apagar</button>
        </form><br>
    </div>
    <div class="modal-footer">
        <button class="modal-close waves-effect waves-green btn-flat">Fechar</button>
    </div>
</div>