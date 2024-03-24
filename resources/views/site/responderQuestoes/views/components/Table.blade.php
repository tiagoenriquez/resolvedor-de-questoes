<script>
    /**
     * @param {string[]} titles
     * @param {object[]} objects
     */
    function Table(titles, objects) {
        /**
         * @param {string | HTMLButtonElement} content
         * @param {string} local
         */
        function Cell(content, local) {
            const tag = local === 'head' ? 'th' : 'td';
            const cell = document.createElement(tag);
            if (typeof content === 'string') cell.textContent = content;
            if (content instanceof HTMLElement) cell.appendChild(content);
            else cell.textContent === '';
            return cell;
        }

        /**
         * @param {any[]} textContents
         * @param {string} local
         */
        function Row(textContents, local) {
            const row = document.createElement('tr');
            textContents.forEach(textContent => row.appendChild(Cell(textContent, local)));
            return row;
        }

        function TableHead() {
            const tableHead = document.createElement('thead');
            tableHead.appendChild(Row(titles, 'head'));
            return tableHead;
        }

        function TableBody() {
            const tableBody = document.createElement('tbody');
            objects.forEach(object => tableBody.appendChild(Row(Object.values(object))));
            return tableBody;
        }

        const table = document.createElement('table');
        table.appendChild(TableHead());
        table.appendChild(TableBody());
        return table;
    }    
</script>