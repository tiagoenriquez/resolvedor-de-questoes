<script>
    /**
     * @param {Prova} prova
     */
    function Menu(prova) {
        const menuItems = [
            MenuItem('Próxima Questão', new Controller().acessarProximaQuestao),
            MenuItem('Listar Questões Respondidas', new Controller().listarQuestoesRespondidas),
            MenuItem('Dados de Desempenho', new Controller().mostrarDadosDeDesempenho),
            MenuItem(`Nota: ${prova.getNota().toFixed(1).replace('.', ',')}`, null)
        ];
        const menu = document.createElement('nav');
        menuItems.forEach(menuItem => menu.appendChild(menuItem));
        return menu;
    }
</script>