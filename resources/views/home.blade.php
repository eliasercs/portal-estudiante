<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('/css/index.css') }}" >

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
        @else
        <li>
          <h3>Portal del estudiante</h3>
        </li>
        @endif
      </ul>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="close-menu">
          <img src="{{ asset('/img/logo.png') }}" alt="UCT">
          <i id="close-menu" class='bi bi-x-lg'></i>
        </div>
        <ul class="nav-list">
            @if (auth()->check())
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
            @else
            <li>
                <a href="#">
                  <i class='bi bi-person-check-fill'></i>
                  <span class="links_name">Iniciar sesión</span>
                </a>
            </li>
            @endif
        </ul>
    </div>

    <script defer src="{{ asset('js/index.js') }}"></script>

    @yield('content')

</body>
</html>