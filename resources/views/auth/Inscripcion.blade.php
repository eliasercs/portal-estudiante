@extends('layout.app')

@section('title', 'Ramos')

@section('content')

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
                        <th>Seccion</th>
                        <th>Profesor</th>
                        <th>Horario</th>
                        <th>Sala</th>
                        <th>Capacidad</th>
                        <th>Cupos</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
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