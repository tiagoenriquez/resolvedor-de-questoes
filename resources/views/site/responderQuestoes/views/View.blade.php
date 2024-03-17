<script>
    /**
     * @param {Prova} prova
     */
    function View(prova) {
        const view = document.getElementById('prova');
        view.innerHTML = '';
        view.appendChild(Menu(prova));
        return view;
    }
</script>