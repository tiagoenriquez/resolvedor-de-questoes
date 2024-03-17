@extends('index')

@section('content')

<main>
    <form action="{{ route('inserir-questao') }}" method="post">
        @csrf
        <h1>Cadastro de Questão</h1>
        <h2>Digite o Enunciado da Questão</h2>
        <textarea name="enunciado" id="enunciado" cols="64" rows="16" autofocus></textarea>
        <button type="submit">Cadastrar</button>
    </form>
</main>

@endsection