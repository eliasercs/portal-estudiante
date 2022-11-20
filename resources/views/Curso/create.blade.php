@extends('layout.app')

@section('headers')
<link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection

@section('content')

<div class="container-registro">
    <div class="container">
        <div class="row vh-100 align-content-center justify-content-center">
            <div class="col-auto">
                <div class="content-container p-3">
                    <h5 class="text-center"><strong>Agregar nuevo curso</strong></h5>
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
                            <label for="exampleInputPassword1" class="form-label">Seleccione la carrera a la que
                                pertenece</label>
                            <select class="form-select" id="carrera" name="carrera">
                                <option value="default">Seleccione la carrera a la que pertenece este curso</option>
                                @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Nuevo Curso</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection