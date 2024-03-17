@extends('index')

@section('content')

<main>
    <h1>Tem certeza de que deseja excluir a questão abaixo?</h1>
    <table>
        <thead>
            <tr>
                <th>Propriedade</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Enunciado</td>
                <td>{{ substr($questao->enunciado, 0, 64) . ' [...]' }}</td>
            </tr>
        </tbody>
    </table>
    <div class="buttons">
        <form action="{{ route('listar-questoes') }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-questao', $questao->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection