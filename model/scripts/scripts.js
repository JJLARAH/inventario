/* Inicia código JS para acciones con objetos */

//Tablas JS
$(document).ready(function () {
    var table = $('#dtProductos').DataTable({
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        initComplete: function () {
            this.api()
                .eq(0)
                .columns([2,3])
                .every(function (colIdx) {
                    var column = this;
                    var cell = $('tfoot th').eq($(column.column(colIdx).header()).index());
                    var title = $(cell).text();
                    var select = $('<select class="form-select form-select-sm"><option value="" selected>' + title + '</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
        },
    });
});

//Tooltips de texto
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

//Boton de los nav-links (Flecha gira arriba / abajo)
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
};

//Boton de la barra de navegación (Expander / contraer)
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("close")) {
        sidebarBtn.classList.replace("bx-x", "bx-menu");
    } else
        sidebarBtn.classList.replace("bx-menu", "bx-x");
};