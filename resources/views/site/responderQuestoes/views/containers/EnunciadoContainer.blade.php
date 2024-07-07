<script>
    /**
     * @param {string} enunciado
     */
    function EnunciadoContainer(enunciado) {
        const paragrafos = enunciado.split("\n");
        const container = document.createElement('div');
        container.className = 'enunciado';
        paragrafos.forEach((paragrafo) => {
            const parte = paragrafo.split('.');
            if (parte.length === 2) {
                try {
                    container.appendChild(Image(`/images/${paragrafo}`), "Imagem do enunciado");
                } catch (error) {
                    container.appendChild(Paragraph(paragrafo));
                }
            } else {
                container.appendChild(Paragraph(paragrafo));
            }
        });
        return container;
    }
</script>