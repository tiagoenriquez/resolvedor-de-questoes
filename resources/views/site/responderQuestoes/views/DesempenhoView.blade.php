<script>
    function DesempenhoView() {
        const titulos = ['Nome da informação', 'Informação'];

        const elements = [
            Heading('Dados de Desempenho'),
            Table(titulos, prova.getDados())
        ];

        const view = View(prova);
        const main = document.createElement('main');
        elements.forEach(element => main.appendChild(element));
        view.appendChild(main);
    }
</script>