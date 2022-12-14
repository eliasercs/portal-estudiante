<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($bootstrap))
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @endif
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-settings.css') }}">
    <!-- css post it -->
    <link rel="stylesheet" href="{{ asset('/css/style_stikers.css') }}">

</head>

<body>
    <div id="page-content">

        <div class="navbar" id="navbar">
            <div class="menu">
                <i id="menu" class="bi bi-list"></i>
            </div>

            <div class="menu">
                <a href="/home">
                    <img class="logo-nav" style="width: 120px;" src="{{ asset('/img/logo.png') }}">
                </a>

            </div>


            @if (auth()->check())

            <div class="dropdown dropdown-header">
                <button class="dropbtn bg-transparent border-0 text-white r-0" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                    <i class="bi bi-caret-down-fill"></i>
                </button>
                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                    <h4 class="border-bottom p-2">Bienvenido, {{ auth()->user()->name }}</h4>
                    <div id="toggle">
                        <input type="checkbox" id="darkmode-toggle" />
                        <label for="darkmode-toggle" id="label-darktheme"></label>
                    </div>
                    <button class="btn btn-danger w-100">
                        <a href="/logout" class="btn btn-cerrarSesion text-white">
                            <i class="bi bi-box-arrow-right"></i>
                            Cerrar sesi??n</a>
                    </button>
                </div>

            </div>

            @else
            <li>
                <h3>Portal del estudiante</h3>
            </li>
            @endif

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
                    <a href="/inscripcion">
                        <i class='bi bi-pencil-square'></i>
                        <span class="links_name">Inscribir Cursos</span>
                    </a>
                </li>

                <li>
                    <a href="/course/delete">
                        <i class='bi bi-trash'></i>
                        <span class="links_name">Eliminar Cursos</span>
                    </a>
                </li>

                <li>
                    <a href="/Academico">
                        <i class='bi bi-info-circle'></i>
                        <span class="links_name">Informaci??n Acad??mica</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class='bi bi-card-checklist'></i>
                        <span class="links_name">Notas Parciales</span>
                    </a>
                </li>
                <li>
                    <a href='/avanceCurricular' target='_blank'>
                        <i class='bi bi-briefcase-fill'></i>
                        <span class="links_name">Avance curricular</span>
                    </a>
                </li>
                <li>
                    <a href="/Asistente">
                        <i class="bi bi-calendar2-date-fill"></i>
                        <span class="links_name">Reserva de horas asistente social</span>
                    </a>
                </li>
                <li>
                    <a href="/Solicitudes">
                        <i class="bi bi-pass-fill"></i>
                        <span class="links_name">Solicitudes estudiantiles</span>
                    </a>
                </li>

                @else
                <li>
                    <a href="#">
                        <i class='bi bi-person-check-fill'></i>
                        <span class="links_name">Iniciar sesi??n</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <script defer src="{{ asset('js/index.js') }}"></script>
        <script defer src="{{ asset('js/darkmode.js') }}"></script>



        @yield('content')
    </div>
</body>

</html>