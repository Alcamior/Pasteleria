@extends('layaout.stencil')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Vibur&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ request()->getHost() === 'localhost' ? asset('css/index.css') : secure_asset('css/index.css') }}">
@endsection


@section('title', 'Pastelería Divina Tentación')

@section('main')

    <header>
        <div class="titulo">
            <h1>Divina Tentación</h1>
            <h1></h1>
        </div>

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/frappeOreo.png') }}" class="d-block mx-auto w-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/frappeCapu.png') }}" class="d-block mx-auto w-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/pastel_rosa.png') }}" class="d-block mx-auto w-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/pastel_mariposa.png') }}" class="d-block mx-auto w-auto" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <p class="descripcion">
            Un pastel para cada ocasión
        </p>
    </header>
    <hr>
    <section>
        <article>
            <div class="container w-75">
                <div class="row pasteles_predisenados">
                    <div class="col-xs-12 col-md-6 flex-column d-flex justify-content-center align-items-center">
                        <h2>¡Prueba nuestros pasteles!</h2>
                        <p>Cada pastel está pensado para crear momentos únicos y memorables. 
                            ¿Cuál probarás primero?</p>
                        <a href="" class="text-left">Conocer más</a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <img src="{{ asset('img/pastel_flan.png') }}" alt="Pastel">
                    </div>
                </div>
            </div>
        </article>
    </section>

@endsection
