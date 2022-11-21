@extends('home')

@section('title', 'Ramos')

@section('content')

<div class="container pt-5">

    <div class="col-auto justify-content-center">

        <div class="row">
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $mensaje }}
                    </div>
                @endif
            </div>
        </div>

        <h5 class="card-tittle text-center">Cursos Inscritos por {{ auth()->user()->name }}</h5>

        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Curso</th>
                        <th>Seccion</th>
                        <th>Creditos</th>
                        <th>Profesor</th>
                        <th>Horario</th>
                        <th>Sala</th>
                        <th>Cupos</th>
                        <th>Inscritos</th>
                        <th>Cambiar</th>
                        <th>Eliminar</th>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                            <tr>
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
                                        <button class="btn btn-success w-100" type="submit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="/course/delete" method="post">
                                        @csrf
                                        <input type="hidden" name="curso_id" value="{{ $item['Sid'] }}">
                                        <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                                        <button class="btn btn-danger w-100" type="submit">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </p>

        <h4>Creditos Disponibles: {{ $creditos }}</h4>

        <h5 class="card-tittle text-center">Cursos disponibles</h5>
        <hr>

        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Sigla</th>
                        <th>Curso</th>
                        <th>Creditos</th>
                        <th>Más detalles</th>
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
                                        <button class="btn btn-success" type="submit">
                                            <i class="bi bi-file-plus"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </p>
        
    </div>
</div>
@endsection