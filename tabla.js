const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Buscador
search.addEventListener('input', searchTable);

function searchTable() {
    const search_data = search.value.toLowerCase();

    table_rows.forEach((row, i) => {
        const table_data = row.textContent.toLowerCase();
        const isVisible = table_data.indexOf(search_data) >= 0;
        row.classList.toggle('hide', !isVisible);
        row.style.setProperty('--delay', i / 25 + 's');
    });

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Ordenador
table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        });

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    };
});

function sortTable(column, sort_asc) {
    const rowsArray = Array.from(table_rows);
    const sortedRows = rowsArray.sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.trim();
        let second_row = b.querySelectorAll('td')[column].textContent.trim();

        if (column === 4) { // Suponiendo que la columna "Cantidad" es la 5ta columna (índice 4)
            first_row = parseFloat(first_row);
            second_row = parseFloat(second_row);
            return sort_asc ? first_row - second_row : second_row - first_row;
        } else {
            first_row = first_row.toLowerCase();
            second_row = second_row.toLowerCase();
            return sort_asc ? (first_row < second_row ? -1 : 1) : (first_row > second_row ? -1 : 1);
        }
    });

    sortedRows.forEach(sorted_row => {
        if (!sorted_row.classList.contains('hide')) {
            document.querySelector('tbody').appendChild(sorted_row);
        }
    });
}

/* exportar */
