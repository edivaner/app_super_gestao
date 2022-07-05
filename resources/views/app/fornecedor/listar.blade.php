@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
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
                            <th>Site</th>
                            <th>E-mail</th>
                            <th>UF</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($fornecedores)
                            
                            @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->id }}</td>
                                    <td>{{ $fornecedor->nome }}</td>
                                    <td>{{ $fornecedor->site }}</td>
                                    <td>{{ $fornecedor->email }}</td>
                                    <td>{{ $fornecedor->uf }}</td>
                                    <td> <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">EXCLUIR</a> </td>
                                    <td> <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">EDITAR</a> </td>
                                </tr>
                            @endforeach

                        @endif
                    </tbody>
                </table>

                @if ($fornecedores)
                    {{ $fornecedores->appends($request)->links()}}
                    <!-- 
                    <br>
                    {{ $fornecedores->count() }} - Total de registros por páginas.
                    <br>
                    {{ $fornecedores->total() }} - Total de registros da consulta.
                    <br>
                    {{ $fornecedores->firstItem() }} - Numero do primeiro registro da página.
                    <br>
                    {{ $fornecedores->lastItem() }} - Numero do último registro da página.
                    -->

                    <br>
                    Exibindo {{$fornecedores->count()}} fornecedores de {{ $fornecedores->total() }} registros.
                    <br>
                    (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->total() }})
                    
                @endif
                
            </div>
        </div>
    </div>
@endsection