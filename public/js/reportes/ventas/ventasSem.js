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

   document.getElementById('exportarGraficoSem').addEventListener('click', function () {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Token CSRF
 

    const chart = Highcharts.chart('graficoVentasSem', {
        chart: { type: 'line' },
        title: { text: null },
        xAxis: {
            title: { text: 'Días' },
            categories: jsonData.dias
        },
        yAxis: {
            title: { text: 'Ganancias' }
        },
        series: [
            { name: 'Pastelería', data: jsonData.ventasP, color: '#b88a64' },
            { name: 'Cafetería', data: jsonData.ventasC, color: '#6c6c70' }
        ]
    });

    setTimeout(() => {
        const canvas = document.createElement('canvas');
        canvas.width = chart.chartWidth;
        canvas.height = chart.chartHeight;
        const context = canvas.getContext('2d');
        const svg = chart.getSVG();
        
        canvg(canvas, svg); // Renderiza el gráfico SVG en el canvas
        const pngBlob = canvas.toBlob(function(blob) {
            const formData = new FormData();
            formData.append('graficoImagenSem', blob);

            // Enviar el archivo PNG al backend (ajusta la URL según tu ruta)
/*             fetch('{{ route('reportes.ventassemanales.pdf')}}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Agrega el token CSRF a los encabezados
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => console.log('Imagen guardada correctamente', data))
            .catch(error => console.error('Error al enviar la imagen:', error)); */
        }, 'image/png');
    }, 500); // Asegúrate de que el gráfico se haya renderizado completamente
});



});


