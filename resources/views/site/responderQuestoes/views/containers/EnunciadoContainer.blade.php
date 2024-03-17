<script>
    /**
     * @param {string} enunciado
     */
    function EnunciadoContainer(enunciado) {
        const paragrafos = enunciado.split("\n");
        const container = document.createElement('div');
        container.className = 'enunciado';
        paragrafos.forEach(paragrafo => container.appendChild(Paragraph(paragrafo)));
        return container;
    }
</script>