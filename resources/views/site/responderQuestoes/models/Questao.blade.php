<script>
    class Questao {
        /** @type {number} @private */ id;
        /** @type {string} @private */ enunciado;
        /** @type {Alternativa[]} @private */ alternativas;
        /** @type {boolean} @private */ respondida;
        /** @type {boolean} @private */ acertada;

        /**
         * @param {number} id
         * @param {string} enunciado
         * @param {object[]} alternativas
         */
        constructor(id, enunciado, alternativas) {
            this.id = id;
            this.enunciado = enunciado;
            this.alternativas = [];
            this.adicionarAlternativas(alternativas);
            this.respondida = false;
            this.acertada = false;
        }

        /**
         * @param {object[]} alternativas
         * @private
         */
        adicionarAlternativas(alternativas) {
            let ids = alternativas.map(alternativa => alternativa.id);
            for (let i = 1; i <= ids.length; i++) {
                const idSorteado = ids[Math.floor(Math.random() * ids.length)];
                const alternativaSorteada = alternativas.filter(alternativa => alternativa.id === idSorteado)[0];
                this.alternativas.push(new Alternativa(
                    i,
                    alternativaSorteada.texto,
                    alternativaSorteada.correta,
                    alternativaSorteada.justificativa
                ));
                ids = ids.filter(id => id !== idSorteado);
            }
        }

        getAlternativas() {
            return this.alternativas;
        }

        getEnunciado() {
            return this.enunciado;
        }

        getId() {
            return this.id;
        }

        isAcertada() {
            return this.acertada;
        }

        isRespondida() {
            return this.respondida;
        }

        /**
         * @param {number} id
         */
        responder(alternativaId) {
            const alternativa = this.alternativas.filter(a => a.getId)[0];
            alternativa.assinalar();
            this.acertada = alternativa.isCorreta() ? true : false;
            this.respondida = true;
        }
    }
</script>