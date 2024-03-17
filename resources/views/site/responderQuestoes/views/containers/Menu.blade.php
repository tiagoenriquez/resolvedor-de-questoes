<script>
    /**
     * @param {Prova} prova
     */
    function Menu(prova) {
        const menuItems = [
            MenuItem('Próxima Questão', new Controller(prova).acessarProximaQuestao),
            MenuItem(`Nota: ${prova.getNota().toFixed(1).replace('.', ',')}`, null)
        ];
        const menu = document.createElement('nav');
        menuItems.forEach(menuItem => menu.appendChild(menuItem));
        return menu;
    }
</script>