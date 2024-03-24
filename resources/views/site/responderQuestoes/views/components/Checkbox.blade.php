<script>
    /**
     * @param {string} id 
     */
    function Checkbox(id) {
        const checkbox = document.createElement('input');
        checkbox.type = 'Checkbox';
        checkbox.id = `checkbox-${id}`;
        checkbox.className = 'checkbox';
        return checkbox;
    }
</script>