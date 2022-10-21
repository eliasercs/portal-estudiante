@extends('layout.app')

@section('title', 'Crear sección para el curso: '.$curso->code)

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

<div>
    <h1>Información del curso</h1>

    <ul>Nombre: <strong>{{ $curso->nombre }}</strong></ul>
    <ul>Código: <strong>{{ $curso->code }}</strong></ul>
    <ul>Créditos: <strong>{{ $curso->creditos }}</strong></ul>
    <ul>Tipo de curso: <strong>{{ $curso->tipo }}</strong></ul>
</div>

<div class="container p-3">
<form action="/testing" method="post">
    @csrf

    <div class="mb-3">
        <input type="hidden" class="form-control" value="{{ $curso->code }}" id="code" name="code">
    </div>


  <div class="mb-3">
    <label for="rut" class="form-label">Ingrese el número de sección</label>
    <input type="number" class="form-control" id="seccion" name="seccion">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Identifique al profesor asignado</label>
    <input type="text" class="form-control" id="profesor" name="profesor">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ingrese día y hora asignada para la clase</label>
    <input type="text" class="form-control" id="horario" name="horario">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Sala</label>
    <input type="text" class="form-control" id="sala" name="sala">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Cupos</label>
    <input type="number" class="form-control" id="capacidad" name="capacidad">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection