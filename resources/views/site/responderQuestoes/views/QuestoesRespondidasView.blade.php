<script>
    function QuestoesRespondidasView() {
        function obterDetalhes(event) {
            new Controller().mostrarDetalhesDaQuestao(Number(event.target.id.replace('botao-', '')));
        }

        const titulos = ['Número da Questão', 'Você acertou?', ''];
        const questoesRespondidas = prova.getQuestoesRespondidas();
        questoesRespondidas.forEach((questao) => {
            questao.botao = Button('Detalhes', obterDetalhes, questao.numero.toString());
        });

        const elements = [
            Heading('Questões Respondidas'),
            Table(titulos, questoesRespondidas)
        ];

        const view = View(prova);
        const main = document.createElement('main');
        elements.forEach(element => main.appendChild(element));
        view.appendChild(main);
    }
</script>