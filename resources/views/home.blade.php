@extends('layout.app')

@section('title', 'Home')

@section('content')

@if(auth()->check())

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/home">UCT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/Academico">Informacion Academica</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/carreras/new">Registrar Carrera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/estudiante/matricular">Matricular Estudiante</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/notas">Ver Notas</a>
      </li>
    </ul>
  </div>
</nav>

<h1 class="text-5xl text-center pt-24">Bienvenido {{ auth()->user()->name }}</h1>
<div class="text-5xl text-center pt-16">
  @if(count(auth()->user()->AcademicRecord)>0)

    @foreach (auth()->user()->AcademicRecord as $academic_record)
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <h3 class="text-center">Su carrera es: {{ $academic_record->Carrera->nombre }}</h3>
      <h3 class="text-center">Plan: {{ $academic_record->plan }}</h3>
      <h3 class="text-center">Ingreso: {{ $academic_record->ingreso }}</h3>
      <h3 class="text-center">Situacion: {{ $academic_record->situacion }}</h3>
    </div>
    @endforeach

  @endif
  
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