@extends('home')

@section('content')

<div class="container p-3">
<form action="/testing/cursos/new" method="post">
    @csrf
  <div class="mb-3">
    <label for="rut" class="form-label">Ingrese la sigla del curso</label>
    <input type="text" class="form-control" id="code" name="code">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nombre del curso</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Créditos</label>
    <input type="number" class="form-control" id="creditos" name="creditos">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tipo de curso</label>
    <input type="text" class="form-control" id="tipo" name="tipo">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Seleccione la carrera a la que pertenece</label>
    <select class="form-select" id="carrera" name="carrera">
        <option value="default">Seleccione la carrera a la que pertenece este curso</option>
        @foreach ($carreras as $carrera)
            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
        @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection