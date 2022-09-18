@extends('layout.app')

@section('title', 'Login')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

<h5 class="fw-bold mb-4 pb-4" style="letter-spacing: 1.5px;">Iniciar sesión</h5>

  <form class="mt-4" method="POST" action="">
    @csrf

<section class="vh-100" style="background-color: grey;">
  <div class="container py-5 h-100 position-relative">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-20">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-7 d-none d-md-block">
              <img src="./img/fondo_01.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; width: 140%">
            </div>
            
            <div class="col-md-6 col-lg-5 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: blue;"></i>
                    <img src="./img/logo.png" alt="" >
                  </div>

                  <h5 class="fw-bold mb-4 pb-4" style="letter-spacing: 1.5px;">Iniciar sesión</h5>

                  <!-- Email input -->

                  <div class="form-outline mb-4 flex-nowrap">
                    <label class="form-label"">Rut</label>
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="email" id="email" name="email" class="form-control form-control-lg border-0" 
                    placeholder="Ingrese su rut sin puntos ni guión"/>
                  </div>

                  <! -- Password input -->

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Contraseña</label>
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
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Recuperar contraseña') }}
                    </a>

                  
                  <a class="link-dark" href="#!">Cambiar contraseña</a>
                     
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  </form>

</div>

@endsection