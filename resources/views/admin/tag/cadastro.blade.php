@extends('index')

@section('content')

<main>
    <form action="{{ route('inserir-tag') }}" method="post">
        @csrf
        <h1>Cadastro de Tag</h1>
        <div class="campo-de-digitacao">
            <label for="nome">Nome da Tag</label>
            <input type="text" name="nome" id="nome" autofocus required />
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</main>

@endsection