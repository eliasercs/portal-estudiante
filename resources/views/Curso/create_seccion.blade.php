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
                    <h5 class="text-center"><strong>Información del curso</strong></h5>

                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Sigla</th>
                          <th>Créditos</th>
                          <th>Tipo de curso</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th><i>{{ $curso->nombre }}</i></th>
                          <th><i>{{ $curso->code }}</i></th>
                          <th><i>{{ $curso->creditos }}</i></th>
                          <th><i>{{ $curso->tipo }}</i></th>
                        </tr>
                      </tbody>
                    </table>

                    <h5 class="text-center"><strong>Agregar nueva sección</strong></h5>
                    <form action="/testing" method="post">
                        @csrf

                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="{{ $curso->code }}" id="code" name="code">
                            <input type="hidden" class="form-control" value="{{ $curso_id }}" id="curso_id" name="curso_id">
                        </div>


                        <div class="mb-3">
                            <label for="rut" class="form-label">Ingrese el número de sección</label>
                            <input type="number" class="form-control" id="seccion" name="seccion">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Identifique al profesor
                                asignado</label>
                            <input type="text" class="form-control" id="profesor" name="profesor">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ingrese día y hora asignada para la
                                clase</label>
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

                        <button type="submit" class="btn btn-primary w-100">Agregar sección</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection