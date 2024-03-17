<script>
    class Controller {
        /** @type {Prova} @private */ prova;

        /**
         * @param {Prova} prova
         */
        constructor(prova) {
            this.prova = prova;
        }

        acessarProximaQuestao() {
            const questao = this.prova.getQuestoes().filter(questao => !questao.isRespondida())[0];
            const nota = this.prova.getNota();
            ProximaQuestaoView(this.prova);
        }
    }
</script>