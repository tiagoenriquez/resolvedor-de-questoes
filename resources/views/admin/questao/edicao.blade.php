@extends('index')

@section('content')

<main>
    <form action="{{ route('atualizar-questao', $questao->id) }}" method="post">
        @method('put')
        @csrf
        <h1>Edição de Questão</h1>
        <h2>Corrija o Enunciado da Questão</h2>
        <textarea name="enunciado" id="enunciado" cols="64" rows="16" autofocus>{{ $questao->enunciado }}</textarea>
        <button type="submit">Atualizar</button>
    </form>
</main>

@endsection