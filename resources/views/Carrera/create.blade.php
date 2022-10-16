@extends('layout.app')

@section('title', 'Crear carrera')

@section('content')

<div class="container p-3">
<form action="/carreras/new" method="post">
    @csrf
  <div class="mb-3">
    <label for="nombre" class="form-label">Carrera</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
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