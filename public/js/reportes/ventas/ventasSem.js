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
    // Generar el gráfico de Highcharts
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

    // Usar un pequeño retraso para asegurar que el gráfico esté completamente renderizado
    setTimeout(() => {
        // Crear el canvas y establecer el tamaño según el gráfico
        const canvas = document.createElement('canvas');
        canvas.width = chart.chartWidth;
        canvas.height = chart.chartHeight;
        const context = canvas.getContext('2d');
        
        // Convertir el gráfico SVG a canvas usando canvg
        const svg = chart.getSVG();
        try {
            canvg(canvas, svg); // Renderiza el SVG en el canvas
            // Convierte el contenido del canvas a una imagen PNG en base64
            const pngBase64 = canvas.toDataURL('image/png').replace(/^data:image\/(png|jpg);base64,/, "");
            
            // Verificar si la conversión fue exitosa
            if (pngBase64) {
                // Asigna el valor base64 al campo de entrada oculto
                document.getElementById('graficoImagenSem').value = pngBase64;

                // Envía el formulario manualmente
                console.log(svg); // Verifica el SVG generado

                document.getElementById('formExportar').submit();
            } else {
                console.error("La imagen base64 no se generó correctamente.");
            }
        } catch (error) {
            console.error('Error al renderizar el SVG con canvg:', error);
        }
    }, 5000); // Ajusta el tiempo de retraso según sea necesario (1 segundo aquí)
});



});


