@extends('layout.app')

@section('title', 'Poner Nota')

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
<form action="/notas/new" method="post">
    @csrf
  <div class="mb-3">
    <label for="usuario" class="form-label">Alumno</label>
    <input type="text" class="form-control" id="usuario" name="usuario">
  </div>
  <div class="mb-3">
    <label for="curso" class="form-label">Curso</label>
    <input type="text" class="form-control" id="curso" name="curso">
  </div>
    <div class="mb-3">
        <label for="nota" class="form-label">Nota</label>
        <input type="text" class="form-control" id="nota" name="nota">
    </div>
    <div class="mb-3">
        <label for="porcentaje" class="form-label">Porcentaje</label>
        <input type="text" class="form-control" id="porcentaje" name="porcentaje">
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>


@endsection
