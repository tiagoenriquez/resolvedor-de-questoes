<div class="enunciado">

    @foreach(explode("\n", $questao->enunciado) as $paragrafo)

    <p>{{ $paragrafo }}</p>

    @endforeach

</div>