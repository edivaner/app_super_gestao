@extends('layout.base')

@section('titulo', $titulo)


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>
    
    <div class="informacao-pagina">
        <div style="width:30%; margin-left:auto; margin-right:auto">
            <form action="{{route('site.login')}}" method="post">
                @csrf
                <input value="{{ old('usuario') }}" type="text" name="usuario" id="usuario" placeholder="Usuário" class="borda-preta">
                {{$errors->has('usuario') ? $errors->first('usuario') : ''}}
                <input value="{{ old('senha') }}" type="password" name="senha" id="senha" placeholder="Senha" class="borda-preta">
                {{$errors->has('senha') ? $errors->first('senha') : ''}}
                <img id="olho" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII="/>
                <button type="submit" class="borda-preta">Acessar</button>
            </form>
            {{isset($erro) && $erro!= '' ? $erro : ''}}
        </div>
        
    </div>  
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="{{asset('img/facebook.png')}}">
        <img src="{{asset('img/linkedin.png')}}">
        <img src="{{asset('img/youtube.png')}}">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>supergestao@dominio.com.br</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="{{asset('img/mapa.png')}}">
    </div>
</div>

@endsection