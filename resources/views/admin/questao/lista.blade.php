@extends('index')

@section('content')

<main>
    <h1>Lista de Questões</h1>
    <table>
        <thead>
            <tr>
                <th>Enunciado</th><th colspan="3"></th>
            </tr>
        </thead>
        <tbody>

            @foreach($questoes as $questao)

            <tr>
                <td>{{ substr($questao->enunciado, 0, 64) . ' [...]' }}</td>
                <td>
                    <form action="{{ route('editar-questao', $questao->id) }}" method="get">
                        <button type="submit">Atualizar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-questao', $questao->id) }}" method="get">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
                <td>                     
                    <form action="{{ route('selecionar-questao', $questao->id) }}" method="get">
                        <button type="submit">Selecionar</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</main>

@endsection