
 // Función para mostrar el formulario correspondiente
 function mostrarFormulario() {
    document.querySelectorAll('.formulario').forEach(form => form.style.display = 'none');
    
    if (document.getElementById('btnradio1').checked) {
        document.getElementById('formulario1').style.display = 'block';
    } else if (document.getElementById('btnradio2').checked) {
        document.getElementById('formulario2').style.display = 'block';
    } else if (document.getElementById('btnradio3').checked) {
        document.getElementById('formulario3').style.display = 'block';
    }
}

// Evento cuando cambia el estado de los botones de radio
document.querySelectorAll('input[name="btnradio"]').forEach(radio => {
  radio.addEventListener('change', mostrarFormulario);
});

// Mostrar el primer formulario por defecto
mostrarFormulario();


//DataTables
$(document).ready(function() {
    $('#ventasTable').DataTable({
        // Opciones adicionales pueden ir aquí
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/Spanish.json' 
        }
    });
});

//Para graficar ventas semanales
document.addEventListener('DOMContentLoaded', function () {

    Highcharts.chart('graficoVentasSem', {
        chart: { type: 'line' },
         title: { text: null },
         xAxis: { 
             title: {
                 text: 'Días'
             },
             categories: jsonData.dias
         },
         yAxis: { 
             title: { 
                 text: 'Ganancias' 
             } 
         },
         series: [
            { 
                name: 'Pastelería', 
                data: jsonData.ventasP,
                color: '#b88a64'
            },
             
            { 
                name: 'Cafetería', 
                data: jsonData.ventasC,
                color: '#6c6c70'
            }
         ]
     });
 });