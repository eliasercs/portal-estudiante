@extends('layout.app')

@section('title', 'Login')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">


  <form class="mt-4" method="POST" action="">
    @csrf

    <section>
      <div class="row g-0">

        <div class="col-lg-7">
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

        <div class="col-lg-5 d-flex flex-column justify-content-center min-vh-100">

          <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
            <img src="./img/logo.png" alt="logo" class="img-fluid">
          </div>

          <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2>Iniciar sesión</h2>
            <form>
                  <! -- Email input -->
                  <div class="form-outline mb-4 flex-nowrap">
                    <label class="form-label"">👤Rut</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg border-0" 
                    placeholder="Ingrese su rut sin puntos ni guión"/>
                  </div>

                  <! -- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">🔒Contraseña</label>
                    <input type="contrasena" id="password" name="password" class="form-control form-control-lg border-0"
                    placeholder="Ingrese su contraseña" />
                  </div>

                  <div class="d-grip gap-2">
                    <button class="btn btn-primary " type="button" style="border-radius: 1rem; width: 100%">Entrar</button>
                  </div>

                  @error('message')        
                    <p class="border border-red-500 rounded-md bg-red-100 w-full
                    text-red-600 p-2 my-2">* {{ $message }}</p>
                  @enderror

                  <div class="flex items-center justify-end mt-4">
                    <a class="text-dark font-weight-bold text-decoration-none" href="{{ route('password.request') }}">
                        {{ __('Recuperar contraseña') }}
                    </a>
                  </div>
                  <a href="#!" class="text-dark font-weight-bold text-decoration-none">Cambiar contraseña</a>
                     
                </form>
          </div>

        </div>
      </div>
    </section>



  </form>

</div>

@endsection