@extends('index')

@section('content')

<main>
    <h1>Questão Selecionada</h1>

    @include('admin.questao.enunciado')
    
    <div class="buttons">
        <form action="{{ route('cadastrar-tag-de-questao', $questao->id) }}" method="get">
            <button type="submit">Inserir Tag</button>
        </form>
        <form action="{{ route('cadastrar-alternativa', $questao->id) }}" method="get">
            <button type="submit">Inserir Alternativa</button>
        </form>
    </div>

    @if(count($questao->tags) > 0)

    <table>
        <thead>
            <tr>
                <th>Tags</th><th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($questao->tags as $tag)

            <tr>
                <td>{{ $tag->nome }}</td>
                <td>
                    <form action="{{ route('excluir-tag-de-questao', [$questao->id, $tag->id]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @endif

    @if(count($questao->alternativas) > 0)

    <table>
        <caption>Alternativas</caption>
        <thead>
            <tr>
                <th>Correta</th>
                <th>Justificativa</th><th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($questao->alternativas as $alternativa)

            <tr>
                <td>{{ $alternativa->correta === true ? 'Sim' : 'Não' }}</td>
                <td>{{ substr($alternativa->texto, 0, 64) . ' [...]' }}</td>
                <td>
                    <form action="{{ route('editar-alternativa', $alternativa->id) }}" method="get">
                        <button type="submit">Atualizar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-alternativa', $alternativa->id) }}" method="get">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @endif

</main>

@endsection