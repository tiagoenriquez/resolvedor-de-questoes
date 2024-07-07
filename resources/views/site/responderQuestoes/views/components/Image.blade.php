<script>
    /**
     * @param {string} resource 
     * @param {string} alternativeText 
     * @returns {HTMLImageElement}
     */
    function Image(resource, alternativeText) {
        const image = document.createElement('img');
        image.src = resource;
        image.alt = alternativeText;
        return image;
    }
</script>