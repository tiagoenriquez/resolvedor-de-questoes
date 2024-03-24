<script>
    class Controller {
        acessarProximaQuestao = () => {
            if (prova.getProximaQuestao() !== undefined) ProximaQuestaoView();
            else this.mostrarDadosDeDesempenho();
        }

        listarQuestoesRespondidas = () => {
            QuestoesRespondidasView();
        }

        mostrarDadosDeDesempenho = () => {
            DesempenhoView();
        }

        /**
         * @param {number} id
         */
        mostrarDetalhesDaQuestao = (id) => {
            DetalhesDeQuestaoView(id);
        }

        /**
         * @param {number} id
         */
        responderQuestao = (id) => {
            prova.responderQuestao(id);
            this.acessarProximaQuestao();
        }
    }
</script>