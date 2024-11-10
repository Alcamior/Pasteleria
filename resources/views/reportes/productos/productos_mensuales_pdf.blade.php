
<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        margin: 60px;
        color: black;
        font-weight: bold
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .fecha {
        font-size: 14px;
        margin-bottom: 20px;
    }
</style>


    <h3 class="title">Reporte de productos más vendidos en el mes</h3>

    <section class="fecha">
        <p>{{ $nombreMes }} del {{ $year }}</p>
    </section>


    <h3>Gráfico de productos</h3>
    <img src="data:image/svg+xml;base64,{{ $graficoImagenMen }}" alt="Gráfico de productos">


    
