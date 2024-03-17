<?php

class ItemDeMenu
{
    public $url;
    public $texto;

    function __construct(string $url, string $texto)
    {
        $this->url = $url;
        $this->texto = $texto;
    }
}

$itensDeMenu = [
    new ItemDeMenu('selecionar-tag', 'Responder Questões'),
    new ItemDeMenu('cadastrar-tag', 'Cadastrar Tag'),
    new ItemDeMenu('listar-tags', 'Listar Tags'),
    new ItemDeMenu('cadastrar-questao', 'Cadastrar Questão'),
    new ItemDeMenu('listar-questoes', 'Listar Questões')
];

?>

<header>
    <nav>
        @foreach ($itensDeMenu as $itemDeMenu)
        <a href="{{ route($itemDeMenu->url) }}">{{ $itemDeMenu->texto }}</a>
        @endforeach
    </nav>
</header>