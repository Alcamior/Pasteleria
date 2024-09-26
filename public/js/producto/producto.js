$(document).ready(function () {
    // Inicializa el DataTable y guarda la instancia en una variable
    const myTable = $('#myTable').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        dom: 'Bfrtip', // Define la estructura de los controles, 'B' es para los botones
        buttons: [
            {
                extend: 'excelHtml5', // Extensión para exportar a Excel
                text: 'Exportar a Excel', // Texto del botón
                titleAttr: 'Exportar a Excel', // Tooltip
                className: 'btn btn-success' // Clase CSS para diseño del botón
            }
        ]
    });

    // Maneja el evento de clic en las filas de la tabla
    $('#myTable tbody').on('click', 'tr', function (e) {
        let classList = e.currentTarget.classList;

        if (classList.contains('selected')) {
            classList.remove('selected');
        } else {
            myTable.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
            classList.add('selected');
        }
    });

    // Maneja el evento de clic en el botón para eliminar filas seleccionadas
    document.querySelector('#button').addEventListener('click', function () {
        const selectedRow = myTable.row('.selected');

        if (selectedRow.length) {
            const rowData = selectedRow.data(); // Obtener datos de la fila seleccionada
            const productId = rowData[0]; // Suponiendo que el ID está en la primera columna

            // Realizar la solicitud AJAX para eliminar el producto
            // Realizar la solicitud AJAX para eliminar el producto
            $.ajax({
                url: '/productos/' + productId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Incluye el token CSRF
                },
                success: function (result) {
                    selectedRow.remove().draw(false);
                    alert(result.message);
                },
                error: function (xhr, status, error) {
                    alert('Error al eliminar el producto: ' + xhr.responseText);
                }
            });
        } else {
            alert('Por favor, selecciona una fila para eliminar.');
        }
    });
});

