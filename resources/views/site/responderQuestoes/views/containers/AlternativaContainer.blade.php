<script>
    /**
     * @param {number} id 
     * @param {string} textContent 
     */
    function AlternativaContainer(id, textContent) {
        const container = document.createElement('div');
        container.className = 'alternativa';
        container.id = `alternativa-${id.toString()}`;
        const checkbox = Checkbox(id.toString());
        const textoElement = Paragraph(textContent, id.toString());
        container.appendChild(checkbox);
        container.appendChild(textoElement);
        container.addEventListener('click', selecionar);
        return container;
    }

    /**
     * @param {ChangeEvent<HTMLInputElement>} event
     */
    function selecionar(event) {
        const idSelecionado = event.target.id.replace('checkbox-', '').replace('paragrafo-', '').replace('alternativa-', '');
        const alternativasElements = document.getElementsByClassName('alternativa');
        const checkboxes = document.getElementsByClassName('checkbox');
        for (let i = 0; i < alternativasElements.length; i++) {
            const id = alternativasElements[i].id.replace('alternativa-', '');
            if (idSelecionado === id) {
                checkboxes[i].checked = true;
            } else {
                checkboxes[i].checked = false;
            }
        }
    }
</script>