//Para graficar ventas mensuales
document.addEventListener('DOMContentLoaded', function () {

  Highcharts.chart('graficoVentasMen', {
      chart: { type: 'line' },
       title: { text: null },
       xAxis: { 
           title: {
               text: 'Días'
           },
           categories: jsonDataMen.dias
       },
       yAxis: { 
           title: { 
               text: 'Ganancias' 
           } 
       },
       series: [
          { 
              name: 'Pastelería', 
              data: jsonDataMen.ventasP,
              color: '#b88a64'
          },
           
          { 
              name: 'Cafetería', 
              data: jsonDataMen.ventasC,
              color: '#6c6c70'
          }
       ]
   });
});

document.getElementById('exportarGraficoMen').addEventListener('click', function() {
    var chart = Highcharts.chart('graficoVentasMen', {
        chart: { type: 'line' },
        title: { text: null },
        xAxis: { 
            title: {
                text: 'Días'
            },
            categories: jsonDataMen.dias
        },
        yAxis: { 
            title: { 
                text: 'Ganancias' 
            } 
        },
        series: [
            { 
                name: 'Pastelería', 
                data: jsonDataMen.ventasP,
                color: '#b88a64'
            },
            
            { 
                name: 'Cafetería', 
                data: jsonDataMen.ventasC,
                color: '#6c6c70'
            }
        ]
    }); 

    var svg = chart.getSVG();  // Obtiene el gráfico en formato SVG
    var svg64 = btoa(unescape(encodeURIComponent(svg)));  // Convierte el SVG a base64

    // Asigna la imagen en base64 al campo oculto para enviarlo al servidor
    document.getElementById('graficoImagenMen').value = svg64;
});