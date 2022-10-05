@extends('layout.app')

@section('title', 'Home')

@section('content')

@if(auth()->check())
<h1 class="text-5xl text-center pt-24">Bienvenido {{ auth()->user()->name }}</h1>
<div class="text-5xl text-center pt-16">
  <p>Información academica</p>

  <div class="col-lg-7 text-align-center"">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <h3 class="text-center">Su carrera es: {{ auth()->user()->carrera }}</h3>
      <h3 class="text-center">Numero de registro: {{ auth()->user()->id }}</h3>
      <h3 class="text-center">Plan: {{ auth()->user()->plan }}</h3>
      <h3 class="text-center">Ingreso: {{ auth()->user()->ingreso }}</h3>
      <h3 class="text-center">Situacion: {{ auth()->user()->situacion }}</h3>
    </div>
  </div>
  
</div>
@else
<h1 class="text-5xl text-center pt-24">Portal del estudiante</h1>
@endif


@endsection

@section('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('status') == 'success')

<script>
  Swal.fire({
    icon: 'success',
    title: '¡Listo!',
    text: 'A iniciado sesión correctamente',
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

@endsection