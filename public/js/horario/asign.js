$(document).ready(function () {
    // Inicializa el DataTable y guarda la instancia en una variable
    const myTable = $('#myTable').DataTable({
        autoWidth: false,
        pagingType: 'simple_numbers',
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        dom: 'frt<"button-container"B>ip', // Define la estructura de los controles, 'B' es para los botones
        buttons: [
            {
                extend: 'excelHtml5', // Extensión para exportar a Excel
                text: 'Exportar a Excel', // Texto del botón
                titleAttr: 'Exportar a Excel', // Tooltip
                className: 'btn btn-success' // Clase CSS para diseño del botón
            }
        ]
    });
});

