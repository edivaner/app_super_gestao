{{$slot}}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$corBorda}}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$corBorda}}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$corBorda}}">
    <br>
{{-- {{print_r($motivo_contatos)}} --}}

    <select name="motivo_contato" class="{{$corBorda}}">
        <option value="">Qual o motivo do contato?</option>
        {{-- <option value="1" {{old('motivo_contato') == '1' ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{old('motivo_contato') == '2' ? 'selected' : ''}} >Elogio</option>
        <option value="3" {{old('motivo_contato') == '3' ? 'selected' : '' }}>Reclamação</option> --}}

        @foreach ($motivo_contatos as $key => $motivo_contato)
        <option value="{{$motivo_contato->id}}" {{old('motivo_contato') == $key ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach

    </select>
    <br>
    <textarea name="mensagem" class="{{$corBorda}}" placeholder="Preencha aqui a sua mensagem">
        {{ (old('mensagem') != '') ? old('mensagem') : '' }}
    </textarea>
    <br>
    <button type="submit" class="{{$corBorda}}">ENVIAR</button>
</form>

<div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
    <pre>
        {{print_r($errors)}}
    </pre>
</div>