<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jockey+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/reportes/reportes.css') }}">
    <title>Dashboard de reportes</title>
</head>
<body>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center mb-3 row-cols-1 row-cols-md-3 g-4">

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reporte de ventas</h5>
                            <p class="card-text">Muestra un reporte de las ventas mensuales, semanales o diarias.</p>
                            <a href="{{ route('reportes.ventas') }}" class="btn btn-primary">Generar reporte</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ranking de productos</h5>
                            <p class="card-text">Ve tus productos más vendidos durenate la semana o el mes.</p>
                            <a href="#" class="btn btn-primary">Generar reporte</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Empleado del mes</h5>
                            <p class="card-text">Consulta al empleado que realizó más ventas durante el mes.</p>
                            <a href="#" class="btn btn-primary">Generar reporte</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Próximos a caducar</h5>
                            <p class="card-text">Ve los productos que están próximos a caducar.</p>
                            <a href="#" class="btn btn-primary">Generar reporte</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos pendientes</h5>
                            <p class="card-text">Consulta los pedidos de pasteles que están próximos a entregar.</p>
                            <a href="#" class="btn btn-primary">Generar reporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>