<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Supes Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('/css/estilo_base.css')}}">
    </head>

    <body>
        @include('layout.partes.topo')

        @yield('conteudo')
    </body>
</html>