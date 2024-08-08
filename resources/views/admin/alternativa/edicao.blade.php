@extends('index')

@section('content')

<main>
    <form action="{{ route('atualizar-alternativa', $alternativa->id) }}" method="post">
        @method('put')
        @csrf
        <h1>Edição de Alternativa</h1>
        <h2>Atualize o texto</h2>
        <textarea name="texto" id="texto" cols="64" rows="4">{{ $alternativa->texto }}</textarea>
        <div class="campo-de-digitacao">
            <label for="correta">Correta?</label>
            <select name="correta" id="correta">
                <option value="{{ $alternativa->correta ? 1 : 0 }}">{{ $alternativa->correta ? 'Sim' : 'Não' }}</option>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="campo-de-digitacao">
            <label for="justificativa">Justificativa</label>
            <textarea name="justificativa" id="justificativa" cols="64" rows="4">{{ $alternativa->justificativa }}</textarea>
        </div>
        <input type="hidden" name="questao_id" value="{{ $alternativa->questao_id }}" />
        <button type="submit">Atualizar</button>
    </form>
</main>

@endsection