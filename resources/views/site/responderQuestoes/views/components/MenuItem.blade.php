<script>
    /**
     * @param {string} textContent
     * @param {() => void} action
     */
    function MenuItem(textContent, action) {
        const menuItem = document.createElement('a');
        menuItem.textContent = textContent;
        menuItem.className = 'menu-item';
        menuItem.addEventListener('click', action);
        return menuItem;
    }
</script>