<script>
    /**
     * @param {Alternativa[]} alternativas
     */
    function AlternativasRespondidasContainer(alternativas) {
        const container = document.createElement('div');
        alternativas.forEach((alternativa) => {
            container.appendChild(AlternativaRespondidaContainer(alternativa));
        });
        return container;
    }
</script>