@extends('layout.app')

@section('title', 'Matricular estudiante')

@section('headers')
<link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection

@section('content')

<div class="container-registro">
    <div class="container">
        <div class="row vh-100 align-content-center justify-content-center">
            <div class="col-auto">

                <div class="content-container p-3">
                    <h5 class="text-center"><strong>Matricular estudiante</strong></h5>
                    <form action="/estudiante/matricular" method="post">
                        @csrf
                        <div class="mb-2">
                            <label for="rut" class="form-label">Ingrese el rut del estudiante</label>
                            <input type="text" class="form-control" id="rut" name="rut">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label">Carrera</label>
                            <select class="form-select" id="carrera" name="carrera">
                                @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</strong></option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label">Situación</label>
                            <input type="text" class="form-control" id="situacion" name="situacion">
                        </div>

                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label">Año de ingreso</label>
                            <input type="number" class="form-control" id="ingreso" name="ingreso">
                        </div>

                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label">Plan</label>
                            <input type="number" class="form-control" id="plan" name="plan">
                        </div>

                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label">Creditos disponibles</label>
                            <input type="number" class="form-control" id="creditos" name="creditos">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Matricular</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
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