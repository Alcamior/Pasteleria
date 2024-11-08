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

document.getElementById('exportarGraficoSem').addEventListener('click', function() {
  var chart = Highcharts.chart('graficoVentasSem', {
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

  var svg = chart.getSVG();  // Obtiene el gráfico en formato SVG
  var svg64 = btoa(unescape(encodeURIComponent(svg)));  // Convierte el SVG a base64

  // Asigna la imagen en base64 al campo oculto para enviarlo al servidor
  document.getElementById('graficoImagenSem').value = svg64;
});