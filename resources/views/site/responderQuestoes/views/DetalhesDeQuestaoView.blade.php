<script>
    /**
     * @param {number} id
     */
    function DetalhesDeQuestaoView(id) {
        const questao = prova.getQuestao(id);

        const elements = [
            Heading(`Detalhes da Questão ${id.toString()} (${questao.isAcertada() ? 'Você acertou' : 'Você errou'})`),
            EnunciadoContainer(questao.getEnunciado()),
            AlternativasRespondidasContainer(questao.getAlternativas())
        ];

        const view = View(prova);
        const main = document.createElement('main');
        elements.forEach(element => main.appendChild(element));
        view.appendChild(main);
    }
</script>