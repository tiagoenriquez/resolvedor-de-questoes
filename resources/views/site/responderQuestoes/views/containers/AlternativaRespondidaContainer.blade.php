<script>
    /**
     * @param {Alternativa} alternativa
     */
    function AlternativaRespondidaContainer(alternativa) {
        const container = document.createElement('div');
        if (alternativa.isAssinalada() && alternativa.isCorreta()) {
            container.className = 'alternativa-respondida-corretamente';
            container.appendChild(Paragraph('Alternativa respondida corretamente:'));
            container.appendChild(Paragraph(alternativa.getTexto()));
            mostrarJustificativa(container, alternativa.getJustificativa());
        } else if (alternativa.isAssinalada() && !alternativa.isCorreta()) {
            container.className = 'alternativa-respondida-erroneamente';
            container.appendChild(Paragraph('Sua Resposta:'));
            container.appendChild(Paragraph(alternativa.getTexto()));
            mostrarJustificativa(container, alternativa.getJustificativa());
        } else if (!alternativa.isAssinalada() && alternativa.isCorreta()) {
            container.className = 'alternativa-correta-nao-assinalada';
            container.appendChild(Paragraph('Resposta Correta:'));
            container.appendChild(Paragraph(alternativa.getTexto()));
            mostrarJustificativa(container, alternativa.getJustificativa());
        } else {
            container.appendChild(Paragraph(alternativa.getTexto()));            
        }
        return container;
    }

    /**
     * @param {HTMLDivElement} container
     * @param {string} justificativa
     */
    function mostrarJustificativa(container, justificativa) {
        if (justificativa) container.appendChild(Paragraph(`Justificativa: ${justificativa}`));
    }
</script>