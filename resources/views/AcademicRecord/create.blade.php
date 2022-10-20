@extends('layout.app')

@section('title', 'Matricular estudiante')

@section('content')

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

<div class="container p-3">
<form action="/estudiante/matricular" method="post">
    @csrf
  <div class="mb-3">
    <label for="rut" class="form-label">Ingrese el rut del estudiante</label>
    <input type="text" class="form-control" id="rut" name="rut">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Carrera</label>
    <select class="form-select" id="carrera" name="carrera">
        @foreach ($carreras as $carrera)
            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</strong></option>
        @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Situación</label>
    <input type="text" class="form-control" id="situacion" name="situacion">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Año de ingreso</label>
    <input type="number" class="form-control" id="ingreso" name="ingreso">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Plan</label>
    <input type="number" class="form-control" id="plan" name="plan">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Creditos disponibles</label>
    <input type="number" class="form-control" id="creditos" name="creditos">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('status') == 'error')
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Usuario no encontrado.',
      })
    </script>
  @endif

@if (session('status') == 'success')
    <script>
      Swal.fire({
        icon: 'success',
        title: '¡Listo!',
        text: 'Usuario matriculado satisfactoriamente.',
      })
    </script>
@endif

@endsection