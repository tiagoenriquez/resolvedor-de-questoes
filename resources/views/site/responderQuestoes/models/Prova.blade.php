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

        getAcertos() {
            return this.acertos;
        }

        getDados() {
            return [
                { chave: 'Número total de questões', valor: this.questoes.length.toString() },
                { chave: 'Número de questões respondidas', valor: this.questoesRespondidas.toString() },
                { chave: 'Número de questões acertadas', valor: this.acertos.toString() },
                { chave: 'Número de questões erradas', valor: this.erros.toString() },
                { chave: 'Nota', valor: this.nota.toFixed(1).replace('.', ',') }
            ];
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

        getNumeroDeQuestoesRespondidas() {
            return this.questoesRespondidas;
        }

        getProximaQuestao() {
            return this.questoes.filter(questao => !questao.isRespondida())[0];
        }

        /**
         * @param {number} id
         */
        getQuestao(id) {
            return this.questoes.filter(questao => questao.getId() === id)[0];
        }

        getQuestoes() {
            return this.questoes;
        }

        getQuestoesRespondidas() {
            const questoes = this.questoes.filter(questao => questao.isRespondida());
            const retorno = [];
            questoes.forEach((questao) => {
                retorno.push({
                    numero: questao.getId().toString(),
                    acertou: `${questao.isAcertada() ? 'Sim' : 'Não'}`
                });
            });
            return retorno;
        }

        /**
         * @param {number} id
         */
        responderQuestao(id) {
            this.getProximaQuestao().responder(id);
            this.calcularDados();
        }

        /**
         * @param {object[]} questoes
         * @private
         */
        adicionarQuestoes(questoes) {
            let ids = questoes.map(questao => questao.id);
            const quantidadeDeIds = ids.length;
            for (let i = 1; i <= quantidadeDeIds; i++) {
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
        calcularDados() {
            this.calcularQuestoesRespondidas();
            this.calcularAcertos();
            this.calcularErros();
            this.calcularNota();
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
    }
</script>