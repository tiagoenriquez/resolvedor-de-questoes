<script>
    class Prova {
        /** @type {Questao[]} @private */ questoes;
        /** @type {number} @private */ numeroDeQuestoes;
        /** @type {number} @private */ questoesRespondidas;
        /** @type {number} @private */ acertos;
        /** @type {number} @private */ erros;
        /** @type {number} @private */ nota;

        /**
         * @param {object[]} questoes
         */
        constructor(questoes) {
            this.questoes = [];
            this.adicionarQuestoes(questoes);
            this.numeroDeQuestoes = this.questoes.length;
            this.calcularQuestoesRespondidas();
            this.calcularAcertos();
            this.calcularErros();
            this.nota = 0;
        }

        /**
         * @param {object[]} questoes
         * @private
         */
        adicionarQuestoes(questoes) {
            let ids = questoes.map(questao => questao.id);
            for (let i = 1; i <= ids.length; i++) {
                const idSorteado = ids[Math.floor(Math.random() * ids.length)];
                const questaoSorteada = questoes.filter(questao => questao.id === idSorteado)[0];
                this.questoes.push(new Questao(i, questaoSorteada.enunciado, questaoSorteada.alternativas));
                ids = ids.filter(id => id !== idSorteado);
            }
        }

        /**
         * @private
         */
        calcularAcertos() {
            this.acertos = this.questoes.filter(questao => questao.isAcertada()).length;
        }

        /**
         * @private
         */
        calcularErros() {
            this.erros = this.questoesRespondidas - this.acertos;
        }

        /**
         * @private
         */
        calcularNota() {
            this.nota = this.acertos / this.questoesRespondidas * 10;
        }

        /**
         * @private
         */
        calcularQuestoesRespondidas() {
            this.questoesRespondidas = this.questoes.filter(questao => questao.isRespondida()).length;
        }

        getAcertos() {
            return this.acertos;
        }

        getErros() {
            return this.erros;
        }

        getNota() {
            return this.nota;
        }

        getNumeroDeQuestoes() {
            return this.numeroDeQuestoes;
        }

        getProximaQuestao() {
            return this.questoes.filter(questao => !questao.isRespondida())[0];
        }

        getQuestoes() {
            return this.questoes;
        }

        getQuestoesRespondidas() {
            return this.questoesRespondidas;
        }
    }
</script>