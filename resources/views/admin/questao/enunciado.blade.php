<div class="enunciado">

    @foreach(explode("\n", $questao->enunciado) as $paragrafo)

    <?php 

    if (strpos($paragrafo, ".")) {
        $partes = explode(".", $paragrafo);
        if (count($partes) === 2) {
            try {
                print("<img src=\"/images/" . $paragrafo . "\" alt=\"Imagem do enunciado\">");
            } catch (Exception $exception) {
                print("<p>" . $paragrafo . "</p>");
            }
        }
    } else {
        print("<p>" . $paragrafo . "</p>");
    }

    ?>

    @endforeach

</div>