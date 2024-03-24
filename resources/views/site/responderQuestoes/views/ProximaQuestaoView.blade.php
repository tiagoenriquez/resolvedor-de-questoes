<script>
    function ProximaQuestaoView() {
        function responder() {
            let idAssinalado = 0;
            const checkboxes = document.getElementsByClassName('checkbox');
            for (let i = 0; i < checkboxes.length; i++) {
                const checkbox = checkboxes[i];
                if (checkbox.checked) {
                    idAssinalado = Number(checkbox.id.replace('checkbox-', ''));
                    break;
                }
            }
            new Controller().responderQuestao(idAssinalado);
        }

        const elements = [
            Heading(`Questão ${prova.getProximaQuestao().getId()}`),
            EnunciadoContainer(prova.getProximaQuestao().getEnunciado()),
            AlternativasContainer(prova.getProximaQuestao().getAlternativas()),
            Button('Responder', responder)
        ];

        const view = View(prova);
        const main = document.createElement('main');
        elements.forEach(element => main.appendChild(element));
        view.appendChild(main);
    }
</script>