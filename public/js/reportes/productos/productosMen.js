//Para graficar ventas mensuales
document.addEventListener('DOMContentLoaded', function () {

    jsonDataMen.cantidad = jsonDataMen.cantidad.map(Number);


    Highcharts.chart('graficoProductosMen', {
        chart: { type: 'column' },
            title: { text: null },
            xAxis: { 
                title: {
                    text: 'Productos'
                },
                categories: jsonDataMen.productos
            },
            yAxis: { 
                title: { 
                    text: 'Cantidad vendida' 
                } 
            },
            series: [
                { 
                    name: 'Cantidad vendida', 
                    data: jsonDataMen.cantidad.map((cantidad, index) => ({
                        y: cantidad,
                        color: ['#9d523b', '#b88a64', '#d4b398'][index % 3]
                    })),
                    showInLegend: false
                }
            ]
    });
});

document.getElementById('exportarGraficoMen').addEventListener('click', function() {
    var chart = Highcharts.chart('graficoProductosMen', {
        chart: { type: 'column' },
            title: { text: null },
            xAxis: { 
                title: {
                    text: 'Productos'
                },
                categories: jsonDataMen.productos
            },
            yAxis: { 
                title: { 
                    text: 'Cantidad vendida' 
                } 
            },
            series: [
                { 
                    name: 'Cantidad vendida', 
                    data: jsonDataMen.cantidad.map((cantidad, index) => ({
                        y: cantidad,
                        color: ['#9d523b', '#b88a64', '#d4b398'][index % 3]
                    })),
                    showInLegend: false
                }
            ]
    });

    var svg = chart.getSVG();  // Obtiene el gráfico en formato SVG
    var svg64 = btoa(unescape(encodeURIComponent(svg)));  // Convierte el SVG a base64

    // Asigna la imagen en base64 al campo oculto para enviarlo al servidor
    document.getElementById('graficoImagenMen').value = svg64;
});
