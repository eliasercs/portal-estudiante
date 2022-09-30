@extends('layout.app')

@section('title', 'Home')

@section('content')

@if(auth()->check())
<h1 class="text-5xl text-center pt-24">Bienvenido {{ auth()->user()->name }}</h1>
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