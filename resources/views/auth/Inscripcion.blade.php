@extends('home')

@section('title', 'Ramos')

@section('content')

<div class="center" style="display: flex; flex-direction: wrap; justify-content: center;">

    <div class="col-lg-7 justify-content-center">

        <div class="px-lg-5 py-lg-4 p-4 align-center">
            <h2>Ramos</h2>
        </div>

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
                        <th>Sigla</th>
                        <th>Curso</th>
                        <th>Seccion</th>
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
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="/course/delete" method="post">
                                        @csrf
                                        <input type="hidden" name="curso_id" value="{{ $item['Sid'] }}">
                                        <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                                        <button class="btn btn-danger" type="submit">
                                            eliminar
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form action="/notas" method="get">
                                        @csrf
                                        <input type="hidden" name="curso_id" value="{{ $item['Sid'] }}">
                                        <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                                        <button class="btn btn-primary" type="submit">
                                            Notas
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

        <h5 class="card-tittle text-center">Cursos Inscritos</h5>
        <hr>

        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Sigla</th>
                        <th>Curso</th>
                        <th>Creditos</th>
                    </thead>

                    <tbody>
                        @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $curso["Sigla"] }}</td>
                                <td>{{ $curso["Curso"] }}</td>
                                <td>{{ $curso["Creditos"] }}</td>

                                <td>
                                    <form action="/inscripcion/seccion" method="post">
                                        @csrf
                                        <input type="hidden" name="curso_id" value="{{ $curso['Cid'] }}">
                                        <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                                        <button class="btn btn-success" type="submit">
                                            Inscribir
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