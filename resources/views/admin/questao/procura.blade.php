@extends('index')

@section('content')

<main>
    <form action="{{ route('questoes-com-trecho') }}" method="post">
        @csrf
        <h1>Ache a Questão</h1>
        <h2>Digite um trecho</h2>
        <textarea name="trecho" id="trecho" cols="64" rows="4" autofocus></textarea>
        <button type="submit">Procurar</button>
    </form>
</main>

@endsection