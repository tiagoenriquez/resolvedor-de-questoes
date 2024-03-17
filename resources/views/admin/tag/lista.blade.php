@extends('index')

@section('content')

<main>
    <h1>Lista de Tags</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th><th colspan="2"></th>
            </tr>
        </thead>
        <tbody>

            @foreach($tags as $tag)

            <tr>
                <td>{{ $tag->nome }}</td>
                <td>
                    <form action="{{ route('editar-tag', $tag->id) }}" method="get">
                        <button type="submit">Atualizar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-tag', $tag->id) }}" method="get">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</main>

@endsection