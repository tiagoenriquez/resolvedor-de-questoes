@extends('index')

@section('content')

<main>
    <h1>Tem certeza de que deseja excluir a seguinte alternativa?</h1>
    <table>
        <thead>
            <tr>
                <th>Propriedade</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Texto</td>
                <td>{{ substr($alternativa->texto, 0, 64) . ' [...]' }}</td>
            </tr>
            <tr>
                <td>Correta</td>
                <td>{{ $alternativa->correta ? 'Sim' : 'Não' }}</td>
            </tr>
            <tr>
                <td>Justificativa</td>
                <td>{{ $alternativa->justificativa }}</td>
            </tr>
            <tr>
                <td>Questão</td>
                <td>{{ substr($alternativa->questao->enunciado, 0, 64) . ' [...]' }}</td>
            </tr>
        </tbody>
    </table>
    <div class="buttons">
        <form action="{{ route('selecionar-questao', $alternativa->questao->id) }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-alternativa', $alternativa->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection