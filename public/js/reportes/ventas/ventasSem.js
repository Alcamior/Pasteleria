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

    function convertirSVGAPNG(svgElement, callback) {
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');

        // Asegúrate de que svgElement es un nodo SVG válido
        var svgData = new XMLSerializer().serializeToString(svgElement);
        var img = new Image();

        // Crear un Blob con el contenido SVG
        var svgBlob = new Blob([svgData], {type: 'image/svg+xml'});
        var url = URL.createObjectURL(svgBlob);

        img.onload = function() {
            // Ajusta el tamaño del canvas al tamaño de la imagen cargada
            canvas.width = img.width*2;
            canvas.height = img.height*2;

            // Si es necesario, ajusta la escala
            // Por ejemplo, puedes ajustar el tamaño aquí
            // canvas.width = img.width * 0.8;
            // canvas.height = img.height * 0.8;

            ctx.drawImage(img, 0, 0);
            var pngData = canvas.toDataURL('image/png'); // Obtén la imagen en formato PNG

            // Convierte el PNG a un Blob
            var byteString = atob(pngData.split(',')[1]); // Decodifica base64 a binario
            var arrayBuffer = new ArrayBuffer(byteString.length);
            var uintArray = new Uint8Array(arrayBuffer);
            for (var i = 0; i < byteString.length; i++) {
                uintArray[i] = byteString.charCodeAt(i);
            }
            var blob = new Blob([uintArray], {type: 'image/png'}); // Crea el Blob de la imagen PNG

            callback(blob); // Pasa el Blob al callback
        };

        img.src = url;
    }


document.getElementById('exportarGraficoSem').addEventListener('click', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
        // Aquí seleccionas el nodo SVG generado por Highcharts
        const svgElement = document.querySelector('#graficoVentasSem svg');

        // Llamamos a la función para convertir el SVG a PNG
        convertirSVGAPNG(svgElement, function(blob) {
            const formData = new FormData();
            formData.append('graficoImagenSem', blob, 'grafico_semanal.png'); // Enviamos la imagen como un Blob

            fetch(ventassemanalesUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(response => response.blob())
            .then(blob => {
                const link = document.createElement('a');
                const url = URL.createObjectURL(blob);
                link.href = url;
                link.download = 'reporte_ventas_semanales.pdf';
                link.click();
                URL.revokeObjectURL(url);
            })
            .catch(error => console.error('Error al enviar la imagen:', error));
        });
    }, 5000); // Espera para asegurarse de que el gráfico se haya renderizado completamente
});



// Función auxiliar para convertir base64 a Blob
function dataURLtoBlob(dataURL) {
    var byteString = atob(dataURL.split(',')[1]);
    var mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];
    var ab = new ArrayBuffer(byteString.length);
    var ia = new Uint8Array(ab);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }
    return new Blob([ab], { type: mimeString });
}


});


