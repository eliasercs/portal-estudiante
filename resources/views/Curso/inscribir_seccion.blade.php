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

    <div class="table">
        <table class="table table-bordered">
            <thead>
                <th>Sigla</th>
                <th>Curso</th>
                <th>Sección</th>
                <th>Profesor</th>
                <th>Horario</th>
                <th>Sala</th>
                <th>Capacidad</th>
                <th>Inscritos</th>
            </thead>
            <tbody>    
                @foreach ($secciones as $seccion)
                    <tr>
                        <td>{{ $curso["code"] }}</td>
                        <td>{{ $curso["nombre"] }}</td>
                        <td>{{ $seccion["numero"] }}</td>
                        <td>{{ $seccion["profesor"] }}</td>
                        <td>{{ $seccion["horario"] }}</td>
                        <td>{{ $seccion["sala"] }}</td>
                        <td>{{ $seccion["capacidad"] }}</td>
                        <td>{{ $seccion["inscritos"] }}</td>
                        <td>
                            <form action="/inscribir/curso" method="post">
                                @csrf
                                <input type="hidden" name="seccion_id" value="{{ $seccion['id'] }}">
                                <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                                @if(!in_array($seccion["id"],$inscrito))
                                <button class="btn btn-primary" type="submit">
                                    Inscribir
                                </buttom>
                                @else
                                <button class="btn btn-primary" disabled type="submit">
                                    Inscrito
                                </buttom>
                                @endif
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</div>

@endsection