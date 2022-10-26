<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('/css/index.css') }}" >
  <script defer src="{{ asset('js/index.js') }}"></script>

  @if(auth()->check())
  <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
  @endif
</head>
<body>

<script type="text/javascript">
    var botmanWidget = {
      //desktopHeight:"",
      //desktopWidth:,
      //mobileHeight:,
      //mobileWidth:,

      aboutLink: null,
      title: "UCTIN",
      bubbleAvatarUrl: "https://images.vexels.com/media/users/3/235658/isolated/preview/ab14b963565a4c5ab27169d90c341994-silueta-animales-21.png",
      placeholderText: "Escribe tu consulta",
      mainColor: '#ffdd00',
      bubbleBackground: "#ffdd00",
      aboutText: 'Escribe tu consulta',
      introMessage: "Hola soy UCTIN encantado de conocerte! \n ¿Quisieras ver las secciones más recomendadas?"
    };
  </script>

    <div class="navbar" id="navbar">
      <div class="menu">
        <i id="menu" class="bi bi-list animate__animated"></i>
      </div>
      <ul>
        @if (auth()->check())
        <li>{{ auth()->user()->name }}</li>
        <li><a href="/logout">Cerrar sesión</a></li>
        @endif
      </ul>
    </div>

<h1 class="text-5xl text-center pt-24">Bienvenido {{ auth()->user()->name }}</h1>
<div class="text-5xl text-center pt-16">
  @if(count(auth()->user()->AcademicRecord)>0)

    @foreach (auth()->user()->AcademicRecord as $academic_record)
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <h3 class="text-center">Su carrera es: {{ $academic_record->Carrera->nombre }}</h3>
      <h3 class="text-center">Plan: {{ $academic_record->plan }}</h3>
      <h3 class="text-center">Ingreso: {{ $academic_record->ingreso }}</h3>
      <h3 class="text-center">Situacion: {{ $academic_record->situacion }}</h3>
    </div>
    @endforeach

    <section class="content" id="content">
      <div class="row">
        <div class="col w100">
          <h2>Noticias</h2>
        </div>
        <div class="col w40">
          <h2>Accesos Directos</h2>

          <div class="accesos-directos-container">
            <input type="radio" name="dot" id="one">
            <input type="radio" name="dot" id="two">

            <div class="accesos-button">
              <label for="one" class="one active"></label>
              <label for="two" class="two"></label>
            </div>

            <div class="main-accesos">
              <div class="accesos">
                <div class="card" style="--img:url(https://p4.wallpaperbetter.com/wallpaper/390/935/605/black-low-poly-monochrome-pattern-wallpaper-preview.jpg)">
                  <div class="card-content">
                    <h2>Reserva de cubículos</h2>
                  </div>
                </div>

                <div class="card" style="--img:url(https://p4.wallpaperbetter.com/wallpaper/390/935/605/black-low-poly-monochrome-pattern-wallpaper-preview.jpg)">
                  <div class="card-content">
                    <h2>Galería de arte</h2>
                  </div>
                </div>

                <div class="card" style="--img:url(https://p4.wallpaperbetter.com/wallpaper/390/935/605/black-low-poly-monochrome-pattern-wallpaper-preview.jpg)">
                  <div class="card-content">
                    <h2>Bibliotecas</h2>
                  </div>
                </div>
              </div>

              <div class="accesos">
                <div class="card" style="--img:url(https://p4.wallpaperbetter.com/wallpaper/390/935/605/black-low-poly-monochrome-pattern-wallpaper-preview.jpg)">
                  <div class="card-content">
                    <h2>Hola 1</h2>
                  </div>
                </div>

                <div class="card" style="--img:url(https://p4.wallpaperbetter.com/wallpaper/439/553/103/minimalist-minimal-art-fox-night-wallpaper-preview.jpg)">
                  <div class="card-content">
                    <h2>Hola 2</h2>
                  </div>
                </div>

                <div class="card" style="--img:url(https://p4.wallpaperbetter.com/wallpaper/44/415/577/minimalist-winter-art-snow-wallpaper-preview.jpg)">
                  <div class="card-content">
                    <h2>Hola 3</h2>
                  </div>
                </div>
              </div>

            </div>
            
          </div>


        </div>
      </div>
    </section>



</body>
</html>