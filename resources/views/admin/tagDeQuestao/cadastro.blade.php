@extends('index')

@section('content')

<main>
    <form action="{{ route('inserir-tag-de-questao') }}" method="post">
        @csrf
        <h1>Cadastro de Tag em Questão</h1>
        <input type="hidden" name="questao_id" value="{{ $questao->id }}" />

        @include('admin.questao.enunciado')
        
        <div class="campo-de-digitacao">
            <label for="tag_id">Selecione uma Tag</label>
            <select name="tag_id" id="tag_id">
                <option value="0"></option>

                @foreach($tags as $tag)

                <option value="{{ $tag->id }}">{{ $tag->nome }}</option>

                @endforeach

            </select>
        </div>
        <button type="submit">Inserir</button>
    </form>
    <form action="{{ route('selecionar-questao', $questao->id) }}" method="get">
        <button type="submit">Voltar</button>
    </form>
</main>

@endsection