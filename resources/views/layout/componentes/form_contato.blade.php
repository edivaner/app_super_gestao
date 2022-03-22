{{$slot}}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$corBorda}}">
        {{ ($errors->has('nome')) ? $errors->first('nome') : ''}}
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$corBorda}}">
        {{ ($errors->has('telefone')) ? $errors->first('telefone') : ''}}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$corBorda}}">
        {{ ($errors->has('email')) ? $errors->first('email') : '' }}
    <br>

    <select name="motivo_contatos_id" class="{{$corBorda}}">
        <option value="">Qual o motivo do contato?</option>
        {{-- <option value="1" {{old('motivo_contato') == '1' ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{old('motivo_contato') == '2' ? 'selected' : ''}} >Elogio</option>
        <option value="3" {{old('motivo_contato') == '3' ? 'selected' : '' }}>Reclamação</option> --}}

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $key ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach

    </select>
        {{ ($errors->has('motivo_contatos_id')) ? $errors->first('motivo_contatos_id') : '' }}
    <br>

    <textarea name="mensagem" class="{{$corBorda}}" placeholder="Preencha aqui a sua mensagem">{{ (old('mensagem') != '') ? old('mensagem') : '' }}</textarea>
        {{ ($errors->has('mensagem')) ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{$corBorda}}">ENVIAR</button>
</form>

@if ($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
        @foreach ($errors->all() as $erro)
            {{$erro}} <br/>
        @endforeach
    </div>
@endif