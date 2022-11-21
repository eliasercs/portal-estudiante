@extends('home')
@section('content')

<div class="center" style="display: flex; flex-direction: wrap; justify-content: center;">

    <div class="col-lg-7 justify-content-center">

        <div class="px-lg-5 py-lg-4 p-4 align-self-center">
            <h2 class="text-center">Solicitudes Estudiantiles</h2>
        </div>
    <div class="row">
        <div class="col-sm-12">
            @if ($mensaje = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $mensaje }}
                </div>
            @endif              
        </div>
    </div>
    <p>
    En esta sección encontrarás el formulario mediante el cual puedes hacer una solicitud de <b>Reincorporación</b>, 
    <b>Suspensión</b> o <b>Renuncia</b>. Además puedes consultar el estado en que se encuentra tu solicitud <br><br>
    Para visualizar el contenido solo debes hacer click sobre el Título de tu interés el cual desplegará el contenido deseado.
    </p>
    <h5 style="color: black;" class="alert alert-danger text-center">Proceso de suspensión <br>Beneficios de arancel MINEDUC 2022</h5>
    <p>
    <b>Estimados Estudiantes: </b><br><br>

    Junto con saludar, informamos que desde el <b>02 de Agosto hasta el 29 de Septiembre</b> se encuentra habilitado el 
    <b>proceso de suspensión de Beneficios Estudiantiles MINEDUC.</p></b>
    <p>SI realizaste suspensión o renuncia académica y cuentas con Gratuidad, Beca de arancel o Fondo Solidario de 
    Crédito Universitario (FSCU) debes ingresar al siguiente link <a href=https://forms.gle/LyZ3ZygrS3TEAQjG8>https://forms.gle/LyZ3ZygrS3TEAQjG8</a> y
    completar el formulario online para solicitar la suspensión de tu beneficio, al que podrás ingresar
    solo a través de tu correo electrónico institucional. <br><br>  

    Descarga <a href="https://estudiantes.uct.cl/documentos/INSTRUCTIVO_SUSPENSJON_BENEFICIOS_ESTUDIANTES.pdf">AQUÍ</a> el instructivo del proceso de suspensión de Beneficios Estudiantes. <br><br>

    <b>Respecto a la carga de documentos en formato PDF, debes considerar lo siguiente:</b> <br>
    1. <b>Formulario suspensiones:</b> Solo lo debes cargar en caso de contar con Beca de arancel. Se exime de 
    esta obligación a los estudiantes que tengan Gratuidad. <br><br>

    2. <b>Documento de respaldo para acreditar motivo de suspensión:</b> Solo lo debes cargar en 
    caso de contar con Gratuidad o Becas de arancel, toda vez que las suspensiones totales desde el año 
    de asignación del beneficio a la fecha (incluyendo solicitud actual) sean superiores a 02 semestres académicos. 
    Se exime de esta obligación a los estudiantes que tengan FSCU. <br><br>

    <b>*EL PROCESO DE SUSPENSIÓN ES DE EXCLUSIVA RESPONSABILIDAD DEL ESTUDIANTE*</b> <br>
    </p>
    <h2 class="alert alert-primary bg-primary text-white">Ingresar Solicitud</h2>
<form action="{{ $route }}" method="post">
    @csrf
    <select class="form-select" aria-label="Default select example" name="data">
        <option selected value="default">Seleccione una carrera</option>
        @foreach ($Academic_Records as $Academic_Record)
            <option value="{{ $Academic_Record->id }}">{{ $Academic_Record->Carrera->nombre }}</option>
        @endforeach
    </select>

    <button class="btn btn-primary" type="submit">Acceder</button>
</form><br><br>

{{ session('status') }}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('status') == 'ok')
    
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Solicitud Enviada',
    })
  </script>
  @endif

@if (session('status') == 'error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'No se ha logrado procesar la solicitud, intentelo de nuevo mas tarde',
    })
  </script>
@endif

</div>
</div>
@endsection