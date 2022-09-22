@extends('layout.app')
@section('title', 'Login')
@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border-0 
rounded-lg shadow-lg">


  <form class="mt-0 mb-auto" method="POST" action="">
    @csrf

    <section>
      <div class="row g-0" >

        <div class="col-lg-7" style="background-color: black;">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./img/fondo_01.jpg" class="d-block w-100 vh-100">
              </div>
              <div class="carousel-item">
                <img src="./img/fondo_04.jpg" class="d-block vh-100">
              </div>
              <div class="carousel-item">
                <img src="./img/fondo_05.jpg" class="d-block w-100 vh-100">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
          </div>

        </div>

        <div class="col-lg-5 d-flex flex-column align-self-center min-vh-100">

          <div class="align-self-center mb-4">
          </div>

          <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
            <img src="./img/logo.png" alt="logo" class="img-fluid">
          </div>
          <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2>Iniciar sesión</h2>
            <form class="mt-4" method="POST" action="{{ route('login.store') }}">
                  @csrf
                  <! -- email input -->
                  <div class="form-outline mb-4 flex-nowrap">
                    <label class="form-label">👤Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg border-0"
                    placeholder="Ingrese su correo"/>
                  </div>

                  <! -- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">🔒Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg border-0"
                    placeholder="Ingrese su contraseña" />
                  </div>

                  <div class="row w-100 d-flex justify-content-between text-center mb-2">
                    <p id="recover_password" class="col-6" data-bs-toggle="modal"
                      data-bs-target="#recover_password_modal">Recuperar contraseña</p>

                    <p id="change_password" class="col-5" data-bs-toggle="modal"
                      data-bs-target="#change_password_modal">Cambiar contraseña</p>
                  </div>

                  <div class="d-grip gap-2">
                    <button class="btn btn-primary " type="submit" 
                    style="border-radius: 1rem; width: 100%">Entrar</button>
                  </div>
                </form>
          </div>
        </div>
      </div>


      <!--Modal para recuperar contraseña-->
      <div class="modal fade" id="recover_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
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
                                  <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary w-100">Recuperar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!--Modal para cambiar contraseña-->
      <div class="modal fade" id="change_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
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
                              <li>Al menos <strong>un punto</strong>.</li>
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
                                  <input type="email" id="email" name="email" class="form-control"
                                    placeholder="name@example.com" required>
                              </div>
                          </div>
                          <div class="mb-2">
                              <label for="exampleFormControlInput1" class="form-label">Contraseña actual</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                  <input type="password" id="password" name="password" class="form-control"
                                      placeholder="Ingrese su contraseña" required>
                                  <span class="input-group-text" id="toggle_current_password"><i class="bi bi-eye-fill"
                                          id="current_password_icon"></i></span>
                              </div>
                          </div>
                          <div class="mb-2">
                              <label for="exampleFormControlInput1" class="form-label">Nueva contraseña</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                  <input type="password" id="new_password" name="new_password" class="form-control"
                                      placeholder="Ingrese su contraseña" required>
                                  <span class="input-group-text" id="toggle_new_password"><i class="bi bi-eye-fill"
                                          id="new_password_icon"></i></span>
                              </div>
                          </div>
                          <div class="mb-5">
                              <label for="exampleFormControlInput1" class="form-label">Repetir nueva contraseña</label>
                              <div class="input-group">
                                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                  <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="form-control" placeholder="Repita su contraseña" required>
                                  <span class="input-group-text" id="toggle_repeat_new_password"><i class="bi bi-eye-fill"
                                          id="repeat_new_password_icon"></i></span>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary w-100">Cambiar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </section>
</div>

@endsection
@section('scripts')

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

  @if (session('forgot') == 'success')
    <script>
      Swal.fire({
        icon: 'success',
        title: '¡Listo!',
        text: 'Se ha enviado un correo con las instrucciones para recuperar su contraseña',
      })
    </script>
  @endif

  @if (session('change') == 'success')
    <script>
      Swal.fire({
        icon: 'success',
        title: '¡Listo!',
        text: 'Se ha cambiado su contraseña',
      })
    </script>
  @endif

  @if (session('change') == 'password_error')
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Las contraseña no coinciden'
      })
    </script>
  @endif

  @if (session('change') == 'error')
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'correo o contraseña incorrectos',
      })
    </script>
  @endif

@endsection