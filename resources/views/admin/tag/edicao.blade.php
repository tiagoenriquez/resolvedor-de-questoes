@extends('index')

@section('content')

<main>
    <form action="{{ route('atualizar-tag', $tag->id) }}" method="post">
        @method('put')
        @csrf
        <h1>Edição de Tag</h1>
        <div class="campo-de-digitacao">
            <label for="nome">Nome da Tag</label>
            <input type="text" name="nome" id="nome" value="{{ $tag->nome }}" autofocus required />
        </div>
        <button type="submit">Atualizar</button>
    </form>
</main>

@endsection