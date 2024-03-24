<script>
    class Alternativa {
        /** @type {number} @param */ id;
        /** @type {string} @param */ texto;
        /** @type {boolean} @param */ correta;
        /** @type {string} @param */ justificativa;
        /** @type {boolean} @param */ assinalada;

        /**
         * @param {number} id
         * @param {string} texto
         * @param {boolean} correta
         * @param {string} justificativa
         */
        constructor(id, texto, correta, justificativa) {
            this.id = id;
            this.texto = texto;
            this.correta = correta === 0 ? false : true;
            this.justificativa = justificativa;
            this.assinalada = false;
        }

        assinalar() {
            this.assinalada = true;
        }

        getId() {
            return this.id;
        }

        getJustificativa() {
            if (this.justificativa === null) {
                return '';
            }
            return this.justificativa;
        }

        getTexto() {
            return this.texto;
        }

        isAssinalada() {
            return this.assinalada;
        }

        isCorreta() {
            return this.correta;
        }
    }
</script>