<script>
    /**
     * @param {string} textContent
     * @param {string} id
     */
    function Paragraph(textContent, id = '') {
        const paragraph = document.createElement('p');
        paragraph.textContent = textContent;
        paragraph.id = id !== '' ? `paragrafo-${id}` : '';
        return paragraph;
    }
</script>