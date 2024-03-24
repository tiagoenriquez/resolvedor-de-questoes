<script>
    /**
     * @param {string} textContent
     * @param {() => void} action
     * @param {string} id
     */
    function Button(textContent, action, id = '') {
        const button = document.createElement('button');
        button.textContent = textContent;
        button.addEventListener('click', action);
        button.id = id !== '' ? `botao-${id}` : '';
        return button;
    }
</script>