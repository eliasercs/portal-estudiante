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
      mainColor: '#038ACE',
      bubbleBackground: "#01568E",
      aboutText: 'Escribe tu consulta',
      introMessage: "Hola soy UCTIN encantado de conocerte! \n ¿Quisieras ver las secciones más recomendadas?"
    };
  </script>

<div class="navbar" id="navbar">
      <div class="menu">
        <i id="menu" class="bi bi-list animate__animated"></i>
      </div>
      <h1>Hola Mundo</h1>
    </div>

    <div class="sidebar" id="sidebar">
        <ul class="nav-list animate__animated">
            <li>
              <a href="#">
                <i class='bi bi-file-earmark-ppt-fill'></i>
                <span class="links_name">Solicitud de Nota P</span>
              </a>
            </li>

            <li>
                <a href="#">
                  <i class='bi bi-pencil-square'></i>
                  <span class="links_name">Inscribir Cursos</span>
                </a>
            </li>

            <li>
                <a href="#">
                  <i class='bi bi-trash'></i>
                  <span class="links_name">Eliminar Cursos</span>
                </a>
            </li>

            <li>
                <a href="#">
                  <i class='bi bi-info-circle'></i>
                  <span class="links_name">Información Académica</span>
                </a>
            </li>

            <li>
                <a href="#">
                  <i class='bi bi-card-checklist'></i>
                  <span class="links_name">Notas Parciales</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="content" id="content">
      <div class="row">
        <div class="col w100">
          <h2>Noticias</h2>
        </div>
        <div class="col w40">
          <h2>Accesos Directos</h2>
          
          <div class="card" style="--img:url(/assets/img/1.jpg)">
            <div class="card-content">
                <h2>Título</h2>
                <p>Descripción</p>
            </div>
          </div>

          <div class="card" style="--img:url(/assets/img/1.jpg)">
            <div class="card-content">
                <h2>Título</h2>
                <p>Descripción</p>
            </div>
          </div>

          <div class="card" style="--img:url(/assets/img/1.jpg)">
            <div class="card-content">
                <h2>Título</h2>
                <p>Descripción</p>
            </div>
          </div>

        </div>
      </div>
    </section>



</body>
</html>