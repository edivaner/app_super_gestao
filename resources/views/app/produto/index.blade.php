@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
                <li><a href="{{ route('produto-detalhe.create') }}">Produto Detalhe</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($produtos)
                            
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->id }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->peso }}</td>
                                    <td>{{ $produto->unidade_id }}</td>
                                    <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                    <td> <a href="{{route('produto.show', ['produto'=>$produto->id])}}">VISUALIZAR</a> </td>
                                    <td> <a href="{{route('produto.edit', ['produto'=>$produto->id])}}">EDITAR</a> </td>
                                    <td> 
                                        {{-- enviando como formulario para ser identificado o metodo delete. com href seria post --}}
                                        <form id="form_{{$produto->id}}" method="POST" action="{{route('produto.destroy', ['produto'=>$produto->id])}}">
                                            @csrf
                                            @method("DELETE")
                                            {{-- <button type="submit">EXCLUIR</button> --}}
                                            <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">EXCLUIR</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif
                    </tbody>
                </table>

                @if ($produtos)
                    {{ $produtos->appends($request)->links()}}
                    <!-- 
                    <br>
                    {{ $produtos->count() }} - Total de registros por páginas.
                    <br>
                    {{ $produtos->total() }} - Total de registros da consulta.
                    <br>
                    {{ $produtos->firstItem() }} - Numero do primeiro registro da página.
                    <br>
                    {{ $produtos->lastItem() }} - Numero do último registro da página.
                    -->

                    <br>
                    Exibindo {{$produtos->count()}} produtos de {{ $produtos->total() }} registros.
                    <br>
                    (de {{ $produtos->firstItem() }} a {{ $produtos->total() }})
                    
                @endif
                
            </div>
        </div>
    </div>
@endsection