@extends('index')

@section('content')

<input type="hidden" id="questoes" value="{{ json_encode($questoes) }}">
<div id="prova"></div>

@include('site.responderQuestoes.models.Alternativa')
@include('site.responderQuestoes.models.Questao')
@include('site.responderQuestoes.models.Prova')
@include('site.responderQuestoes.controllers.Controller')
@include('site.responderQuestoes.views.components.Button')
@include('site.responderQuestoes.views.components.Checkbox')
@include('site.responderQuestoes.views.components.Heading')
@include('site.responderQuestoes.views.components.Image')
@include('site.responderQuestoes.views.components.MenuItem')
@include('site.responderQuestoes.views.components.Paragraph')
@include('site.responderQuestoes.views.components.Table')
@include('site.responderQuestoes.views.containers.AlternativaContainer')
@include('site.responderQuestoes.views.containers.AlternativaRespondidaContainer')
@include('site.responderQuestoes.views.containers.AlternativasContainer')
@include('site.responderQuestoes.views.containers.AlternativasRespondidasContainer')
@include('site.responderQuestoes.views.containers.EnunciadoContainer')
@include('site.responderQuestoes.views.containers.Menu')
@include('site.responderQuestoes.views.View')
@include('site.responderQuestoes.views.DesempenhoView')
@include('site.responderQuestoes.views.DetalhesDeQuestaoView')
@include('site.responderQuestoes.views.ProximaQuestaoView')
@include('site.responderQuestoes.views.QuestoesRespondidasView')

<script>
    const questoesElement = document.getElementById('questoes');
    const questoes = JSON.parse(questoesElement.value);
    const prova = new Prova(questoes);
    const controller = new Controller();
    controller.acessarProximaQuestao();
</script>

@endsection