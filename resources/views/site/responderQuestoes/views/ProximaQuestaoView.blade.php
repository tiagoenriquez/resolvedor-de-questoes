<script>
    function ProximaQuestaoView(prova) {
        /** @type {HTMLElement[]} */ const elements = [
            Heading(`Questão ${prova.getProximaQuestao().getId()}`),
            EnunciadoContainer(prova.getProximaQuestao().getEnunciado())
        ];
        const view = View(prova);
        const main = document.createElement('main');
        elements.forEach(element => main.appendChild(element));
        view.appendChild(main);
    }
</script>