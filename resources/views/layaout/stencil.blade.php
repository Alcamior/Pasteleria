<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/layaout/stencil.css') }}">
    <title>@yield('title')</title>
    
</head>
<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img src="{{asset('img/logo_negro.png')}}" alt="Logo de la pastelería" name="cloud-outline" id="cloud">
                <span>Divina <br>Tentación</span>
            </div>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bag-plus-fill"></i>
                            <span>Pedido</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" {{-- href="{{route('consultar-pedido')}}" --}}>Consultar</a></li>
                            <li><a class="dropdown-item"{{--  href="{{route('pedido/create')}}" --}}>Agregr nuevo</a></li>
                        </ul>
                    </div>
                </li>
                
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-box-seam"></i>
                            <span>Almacenaje</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('consultar-almacenaje')}}">Consultar</a></li>
                            <li><a class="dropdown-item" href="{{route('almacenaje.create')}}">Agregr nuevo</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cake2"></i>
                            <span>Productos</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('consultar-producto')}}">Consultar</a></li>
                            <li><a class="dropdown-item" href="{{route('producto.create')}}">Agregr nuevo</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-tags-fill"></i>
                            <span>Promociones</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('consultar-producto')}}">Consultar</a></li>
                            <li><a class="dropdown-item" href="{{route('producto.create')}}">Agregr nuevo</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                            <span>Clientes</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('consultar-cliente')}}">Consultar</a></li>
                            <li><a class="dropdown-item" href="{{route('cliente.create')}}">Agregr nuevo</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-file-person"></i>
                            <span>Empelados</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('consultar-empleado')}}">Consultar</a></li>
                            <li><a class="dropdown-item" href="{{route('empleado.create')}}">Agregr nuevo</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-calendar-day"></i>
                            <span>Horario</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('consultar-cliente')}}">Consultar</a></li>
                            <li><a class="dropdown-item" href="{{route('cliente.create')}}">Agregr nuevo</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-currency-dollar"></i>
                            <span>Venta</span> 
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" {{-- href="{{route('consultar-cliente')}}" --}}>Consultar</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>
            @auth
            @csrf
            <div class="logout">
                <div class="content">
                    <i class="bi bi-box-arrow-right"></i>
                    <a href="{{route('logout')}}">Cerrar sesión</a>
                </div>
            </div>
            @endauth
            <div class="usuario">
                <img src="/Jhampier.jpg" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        
                        @if (Auth::guard('empleado')->check())
                        <span class="nombre">{{ Auth::guard('empleado')->user()->nombre }}</span>
                        <span class="email">{{ Auth::guard('empleado')->user()->email }}</span>
                    @else
                        <span>No autenticado</span>
                    @endif
                    </div>
                    
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>

    </div>


    <main>
        @yield('main')
    </main>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/layaout/stencil.js') }}"></script>
</body>
</html>