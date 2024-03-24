<script>
    /**
     * @param {Alternativa[]} alternativas
     */
    function AlternativasContainer(alternativas) {
        const alternativasContainer = document.createElement('div');
        alternativasContainer.className = 'alternativas';
        alternativas.forEach((alternativa) => {
            const alternativaContainer = AlternativaContainer(alternativa.getId(), alternativa.getTexto());
            alternativaContainer.id = `alternativa-${alternativa.getId().toString()}`;
            alternativasContainer.appendChild(alternativaContainer);
        });
        return alternativasContainer;
    }
</script>