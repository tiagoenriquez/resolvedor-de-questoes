@extends('index')

@section('content')

<main>
    <h1>Tem certeza de deseja excluir a tag abaixo?</h1>
    <table>
        <thead>
            <tr>
                <th>Chave</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nome</td>
                <td>{{ $tag->nome }}</td>
            </tr>
        </tbody>
    </table>
    <div class="buttons">
        <form action="{{ route('listar-tags') }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-tag', $tag->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection