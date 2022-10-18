@extends('layout.app')

@section('title', 'Poner Nota')

@section('content')

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
