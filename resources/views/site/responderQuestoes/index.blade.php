@extends('index')

@section('content')

<input type="hidden" id="questoes" value="{{ json_encode($questoes) }}">
<div id="prova"></div>

@include('site.responderQuestoes.models.Alternativa')
@include('site.responderQuestoes.models.Questao')
@include('site.responderQuestoes.models.Prova')
@include('site.responderQuestoes.controllers.Controller')
@include('site.responderQuestoes.views.components.Heading')
@include('site.responderQuestoes.views.components.MenuItem')
@include('site.responderQuestoes.views.components.Paragraph')
@include('site.responderQuestoes.views.containers.EnunciadoContainer')
@include('site.responderQuestoes.views.containers.Menu')
@include('site.responderQuestoes.views.View')
@include('site.responderQuestoes.views.ProximaQuestaoView')

<script>
    /** @type {HTMLInputElement} */ const questoesElement = document.getElementById('questoes');
    const questoes = JSON.parse(questoesElement.value);
    const prova = new Prova(questoes);
    const controller = new Controller(prova);
    controller.acessarProximaQuestao();
</script>

@endsection