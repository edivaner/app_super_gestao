<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('/css/estilo_base.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{asset('/js/index.js')}}"></script>
    </head>

    <body>
        @include('app.layouts.partials.topo')

        @yield('conteudo')
    </body>
</html>