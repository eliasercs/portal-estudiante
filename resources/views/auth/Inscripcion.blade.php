@extends('layout.app')

@section('title', 'Ramos')

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

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
    rounded-lg shadow-lg">
  <section>
    <div class="row g-0">
      <div class="col-lg-5 d-flex flex-column justify-content-center min-vh-100">
        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
          <img src="./img/logo.png" alt="logo" class="img-fluid">
        </div>

        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: black;">Ramos</h2>
        </div>

        <div>
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                    
                </div>
            </div>
            <h5 class="card-title text-center">Cursos Inscritos por {{ auth()->user()->name }}</h5>
            <div class="table">
                    <table class="table table-bordered">
                    <thead>
                        <th>Sigla</th>
                        <th>Curso</th>
                        <th>Sección</th>
                        <th>Creditos</th>
                        <th>Profesor</th>
                        <th>Horario</th>
                        <th>Sala</th>
                        <th>Cupos</th>
                        <th>Inscritos</th>
                    </thead>
                    <tbody>    
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item["Sigla"] }}</td>
                        <td>{{ $item["Curso"] }}</td>
                        <td>{{ $item["Seccion"] }}</td>
                        <td>{{ $item["Creditos"] }}</td>
                        <td>{{ $item["Profesor"] }}</td>
                        <td>{{ $item["Horario"] }}</td>
                        <td>{{ $item["Sala"] }}</td>
                        <td>{{ $item["Capacidad"] }}</td>
                        <td>{{ $item["Inscritos"] }}</td>
                        <td>
                        <form action="/inscripcion/seccion" method="post">
                        @csrf
                        <input type="hidden" name="curso_id" value="{{ $item['Cid'] }}">
                        <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                        <button class="btn btn-success" type="submit">
                            Cambio de Seccion
                        </buttom>
                        </form>
                        </td>
                        <td>
                        <form action="/course/delete" method="post">
                        @csrf
                        <input type="hidden" name="curso_id" value="{{ $item['Sid'] }}">
                        <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                        <button class="btn btn-danger" type="submit">
                            eliminar
                        </buttom>
                        </form>
                        </td>
                        <td>
                        <form action="/notas" method="get">
                        @csrf
                        <input type="hidden" name="curso_id" value="{{ $item['Cid'] }}">
                        <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                        <button class="btn btn-success" type="submit">
                            Notas
                        </buttom>
                        </form>
                        </td>
                @endforeach
                </table>
                </div>

                <h4>Creditos Disponibles: {{ $creditos }}</h4>
            <h5 class="card-title text-center">Cursos Disponibles</h5>
            <hr>
            <div class="card-text">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sigla</th>
                            <th>Curso</th>
                            <th>Créditos</th>
                        </thead>
                        <tbody>    
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td>{{ $curso["sigla"] }}</td>
                                    <td>{{ $curso["nombre"] }}</td>
                                    <td>{{ $curso["creditos"] }}</td>
                                    <td>
                                        <form action="/inscripcion/seccion" method="post">
                                            @csrf
                                            <input type="hidden" name="curso_id" value="{{ $curso['id'] }}">
                                            <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                                            <button class="btn btn-primary" type="submit">
                                                Inscribir
                                            </buttom>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection