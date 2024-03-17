@extends('index')

@section('content')

<main>
    <form action="{{ route('responder-questoes') }}" method="get">
        <h1>Selecione uma Tag</h1>
        <select name="tag_id" id="tag_id">
            <option value=""></option>

            @foreach($tags as $tag)

            <option value="{{ $tag->id }}">{{ $tag->nome }}</option>

            @endforeach

        </select>
        <button type="submit">Responder às Questões</button>
    </form>
</main>

@endsection