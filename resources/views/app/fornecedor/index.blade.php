<h3>Fornecedores</h3>

@isset($fornecedores)
    @foreach ($fornecedores as $fornecedor)
        {{$loop->iteration}} -
        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status'] ?? 'Dado não preenchido'}}
        <br>
        CNPJ: {{$fornecedor['cnpj']}}
        <br>
        Telefone:({{$fornecedor['ddd'] ?? ''}})  {{$fornecedor['telefone'] ?? ''}}
        <br>
        @if ($loop->first)
            Primeira interação
        @elseif($loop->last)
            Última interação 
        @endif
        <br> 
        <hr>
    @endforeach
@endisset