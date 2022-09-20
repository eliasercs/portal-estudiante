@extends('layout.app')

@section('title', 'recuperar contraseña')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">
  <section>
    <div class="row g-0">
      <div class="col-lg-5 d-flex flex-column justify-content-center min-vh-100">

        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
            <img src="./img/logo.png" alt="logo" class="img-fluid">
        </div>

        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
          <h2>Recuperar contraseña</h2>
          <form class="mt-4" method="POST" action="">
            @csrf
            <div class="form-outline mb-4 flex-nowrap">
              <input type="text"  id="email" name="email" class="form-control form-control-lg border-0" 
                placeholder="Email"/>
            </div>
            <div class="d-grip gap-2">
              <button type="submit" class="btn btn-primary " style="border-radius: 1rem; width: 100%">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection

@section('scripts')

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  @if (session('status') == 'success')
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Enviado',
        text: 'Se ha enviado un correo a su cuenta de correo',
      })
    </script>
  @endif

  @if ($errors->any())
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'El correo ingresado no existe',
      })
    </script>
  @endif

@endsection