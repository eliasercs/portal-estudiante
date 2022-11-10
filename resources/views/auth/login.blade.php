@extends('layout.app')

@section('title', 'Inicio')

@section('headers')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

<script defer src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
<script defer src="{{ asset('/js/mapa.js') }}"></script>
<script defer src="{{ asset('/js/login.js') }}"></script>

@endsection

@section('content')

<div class="container-fluid p-0 m-0">
  <div class="row g-0">

    <div class="col-lg-4 d-flex flex-column justify-content-center vh-100">
      <div class="row g-0">
        <div class="col-sm-12 p-5">
          <img src="{{ asset('/img/logo.png') }}" class="d-block w-75" alt="Logo UCT">
        </div>
      </div>
      <div class="row g-0 align-items-center">
        <section class="col p-5">
          <h3 class="mb-5">Iniciar sesión</h3>
          <form method="POST" action="/">
            @csrf
            <div class="mb-5">
              <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="name@example.com">
              </div>
            </div>
            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                <span class="input-group-text" id="toggle_password"><i class="bi bi-eye-fill" id="password_icon"></i></span>
              </div>
            </div>
            <div class="row w-100 d-flex justify-content-between text-center mb-5">
              <p id="recover_password" class="col-6" data-bs-toggle="modal" data-bs-target="#recover_password_modal">Recuperar contraseña</p>

              <p id="change_password" class="col-5" data-bs-toggle="modal" data-bs-target="#change_password_modal">Cambiar contraseña</p>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
      </section>
    </div>
  </div>

  <div class="col-lg-8">
      <div id="map" style="height: 100vh; position:relative; width: 100%;"></div>
    </div>

</div>


  <!--Modal para recuperar contraseña-->
  <div class="modal fade" id="recover_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Recuperar contraseña</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3">
          <div class="alert alert-primary mb-5" role="alert">
            <p>Se <strong>enviarán</strong> todas las instrucciones de recuperación a su <strong>correo
                electrónico</strong>.</p>
          </div>
          <form class="formulario_email" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-5">
              <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" id="your-email" name="email" class="form-control" placeholder="name@example.com" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Recuperar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Modal para cambiar contraseña-->
  <div class="modal fade" id="change_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar contraseña</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3">
          <div class="alert alert-success mb-5" role="alert">
            <p>Su nueva contraseña <strong>debe contener</strong>:</p>
            <ul>
              <li>8 carácteres de longitud.</li>
              <li>Al menos <strong>una letra en mayúscula</strong> y al menos <strong>un número</strong>.
              </li>
              <li>Sólo carácteres alfanuméricos, <strong>sin carácteres especiales</strong> como:
                <strong>($|#|"|%|&|/||()|°|=|¡!|¿?|{}|ñ|á|^|~)</strong>
              </li>
              <li>Su nueva contraseña <strong>no debe ser idéntica</strong> a su contraseña actual.</li>
            </ul>
          </div>
          <form method="POST" action="{{ route('Change-Password') }}">
            @csrf
            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
              </div>
            </div>
            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label">Contraseña actual</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" id="current_password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                <span class="input-group-text" id="toggle_current_password"><i class="bi bi-eye-fill" id="current_password_icon"></i></span>
              </div>
            </div>
            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label">Nueva contraseña</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Ingrese su contraseña" required>
                <span class="input-group-text" id="toggle_new_password"><i class="bi bi-eye-fill" id="new_password_icon"></i></span>
              </div>
            </div>
            <div class="mb-5">
              <label for="exampleFormControlInput1" class="form-label">Repetir nueva contraseña</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" id="repeat_new_password" name="new_password_confirmation" class="form-control" placeholder="Repita su contraseña" required>
                <span class="input-group-text" id="toggle_repeat_new_password"><i class="bi bi-eye-fill" id="repeat_new_password_icon"></i></span>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cambiar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  @if (session('status') == 'error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'correo o contraseña incorrectos',
    })
  </script>
  @endif

  @if (session('status') == 'current_password_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'La contraseña actual ingresada no es correcta.',
    })
  </script>
  @endif

  @if (session('status') == 'user_email_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'El correo electrónico ingresado no coincide con nuestros registros.',
    })
  </script>
  @endif

  @if (session('status') == 'password_validation_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Las nuevas contraseñas ingresadas no coinciden entre si.',
    })
  </script>
  @endif

  @if (session('forgot') == 'success')
  <script>
    Swal.fire({
      icon: 'success',
      title: '¡Listo!',
      text: 'Se ha enviado un correo con las instrucciones para recuperar su contraseña',
    })
  </script>
  @endif

  @if (session('success') == 'password_changed')
  <script>
    Swal.fire({
      icon: 'success',
      title: '¡Listo!',
      text: 'Su contraseña ha sido cambiada con éxito',
    })
  </script>
  @endif

  @if (session('change') == 'password_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Contraseña no válida',
    })
  </script>
  @endif

  @if (session('change') == 'password_changed')
  <script>
    Swal.fire({
      icon: 'success',
      title: '¡Listo!',
      text: 'Se ha cambiado su contraseña con éxito',
    })
  </script>
  @endif

  @if (session('change') == 'symbol_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Su nueva contraseña no debe incluir carácteres especiales.'
    })
  </script>
  @endif

  @if (session('change') == 'upper_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Su nueva contraseña debe incorporar al menos un carácter en mayúscula.'
    })
  </script>
  @endif

  @if (session('change') == 'lower_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Su nueva contraseña debe incorporar al menos un carácter en minúscula.'
    })
  </script>
  @endif

  @if (session('change') == 'number_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Su nueva contraseña debe incorporar al menos un número.'
    })
  </script>
  @endif

  @if (session('change') == 'len_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Su nueva contraseña debe estar conformado por mínimo 8 carácteres.'
    })
  </script>
  @endif

  @if (session('change') == 'point_error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Su nueva contraseña debe incorporar al menos un punto.'
    })
  </script>
  @endif

  @if (session('change') == 'success')
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Ok',
      text: 'Contraseña actualizada con éxito.'
    })
  </script>
  @endif

  @endsection