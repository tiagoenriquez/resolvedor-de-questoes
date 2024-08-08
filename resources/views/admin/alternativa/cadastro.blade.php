@extends('index')

@section('content')

<main>
    <form action="{{ route('inserir-alternativa') }}" method="post">
        @csrf
        <h1>Cadastro de Alternativa</h1>
        <h2>Questão</h2>

        @include('admin.questao.enunciado')

        @if(count($questao->alternativas) > 0)

        <table>
            <thead>
                <tr>
                    <th>Correta</th>
                    <th>Texto</th>
                </tr>
            </thead>
            <tbody>

                @foreach($questao->alternativas as $alternativa)

                <tr>
                    <td><input type="checkbox" class="checkbox" disabled @if($alternativa->correta === 1) checked @endif></td>
                    <td>{{ $alternativa->texto }}</td>
                </tr>

                @endforeach

            </tbody>
        </table>

        @endif

        <h2>Digite o texto da alternativa</h2>
        <textarea name="texto" id="texto" cols="82" rows="4" autofocus required></textarea>
        <div class="campo-de-digitacao">
            <label for="correta">Correta?</label>
            <select name="correta" id="correta">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="campo-de-digitacao">
            <label for="justificativa">Justificativa</label>
            <textarea name="justificativa" id="justificativa" cols="64" rows="4"></textarea>
        </div>
        <input type="hidden" name="questao_id" value="{{ $questao->id }}" />
        <button type="submit">Cadastrar</button>
    </form>    
    <form action="{{ route('selecionar-questao', $questao->id) }}" method="get">
        <button type="submit">Voltar</button>
    </form>
</main>

@endsection