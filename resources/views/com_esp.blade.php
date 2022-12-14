<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    @if(isset($bootstrap))
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endif
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <a href="/solinotap">
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
            <li>
                <a href='PDF' target='_blank'>
                    <i class='bi bi-briefcase-fill'></i>
                    <span class="links_name">Avance curricular</span>
                </a>
            </li>
            <li>
                <a href="/com_esp">
                    <i class="bi bi-clipboard2-x-fill"></i>
                    <span class="links_name">Competencias especficas</span>
                </a>
            </li>

            @else
            <li>
                <a href="/">
                    <i class='bi bi-person-check-fill'></i>
                    <span class="links_name">Iniciar sesión</span>
                </a>
            </li>
            @endif
        </ul>
    </div>

    <script defer src="{{ asset('js/index.js') }}"></script>

    @yield('content')

    @if (auth()->check())
    <h5 class="card-title text-center">Cursos Inscritos</h5>
    <hr>
    <div class="card-text">
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <th>Fecha</th>
                    <th>Sigla</th>
                    <th>Nombre de la asignatura</th>
                    <th>Sección</th>
                    <th>Competencia</th>
                    <th>Nivel</th>
                    <th>Estado</th>

                </thead>
                <tbody>
                    <!-- foreach -->
                    <tr>
                        <td>01/01/01</td>
                        <td>dsfdsf</td>
                        <td>asdasd</td>
                        <td>asd</td>
                        <td>asdsad</td>
                        <td>asdasd</td>
                        <td>asdasd</td>

                    </tr>
                    <!-- endfor -->
                </tbody>
            </table>
            <hr>
        </div>
    </div>
    @endif
</body>

</html>