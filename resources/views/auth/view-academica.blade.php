@extends('home')

@section('content')

<div class="center" style="display: flex; flex-direction: wrap; justify-content: center;">

    <div class="col-lg-7 justify-content-center">
      <div>

        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: black;">Información Academica</h2>
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

            <h5 class="card-title text-center">Estado</h5>
            <hr>

            <p class="card-text">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>Carrera</th>
                            <th>Plan</th>
                            <th>Ingreso</th>
                            <th>Situacion</th>
                            <th>Cursos inscritos</th>
                            <th>Ficha Avance Curricular</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $academic_record->Carrera->nombre }}</td>
                                <td>{{ $academic_record->plan }}</td>
                                <td>{{ $academic_record->ingreso }}</td>
                                <td>{{ $academic_record->situacion }}</td>
                                <td><a href="/imprimir/academic_record={{$academic_record->id}}">PDF</a></td>
                                <td><a href="/descargaFAC/academic_record={{$academic_record->id}}">Descargar</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </p>
        </div>


        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: black;">Historia Academica</h2>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif    
                </div>
            </div>
            <h5 class="card-title text-center">Cursos Actuales</h5>
            <hr>
            <p class="card-text">
                <div class="table table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            
                            <th>Año</th>
                            <th>Semestre</th>
                            <th>Siglas</th>
                            <th>Nombre del Curso</th>
                            <th>Seccion</th>
                            <th>Creditos</th>
                            <th>Tipo</th>
                        </thead>
                        <tbody>
                        @foreach ($ramos as $item) 
                            <tr>
                                <td>{{ $item["Año"] }}</td>
                                <td>{{ $item["Semestre"] }}</td>
                                <td>{{ $item["Sigla"] }}</td>
                                <td>{{ $item["Curso"] }}</td>
                                <td>{{ $item["Seccion"] }}</td>
                                <td>{{ $item["Creditos"] }}</td>
                                <td>{{ $item["Tipo"] }}</td>
                                <td>
                                
                            </td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
            </p>
            <h5 class="card-title text-center">Salas Asignadas</h5>
            <hr>
            <p class="card-text">
                <div class="table table-responsive">
                @foreach ($ramos as $item) 
                <table class="table table-sm table-bordered">
                        <thead>                        
                            <th>{{ $item["Curso"] }}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Seccion: {{ $item["Seccion"] }}</td>
                                <td>Sala: {{ $item["Sala"] }}</td>
                                <td>Horario: {{ $item["Horario"] }}</td>

                            </tr>  
                        </tbody> 
                    </table>
                @endforeach
                    
                </div>
            </p>

            <h5 class="card-title text-center">Historia Academica</h5>
            <hr>
            <p class="card-text">
                <div class="table table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>Año</th>
                            <th>Semestre</th>
                            <th>Siglas</th>
                            <th>Nombre del Curso</th>
                            <th>Creditos</th>
                            <th>Nota</th>
                        </thead>
                        <tbody>
                        @foreach ($record as $item) 
                            <tr>
                                <td>{{ $item["Año"] }}</td>
                                <td>{{ $item["Semestre"] }}</td>
                                <td>{{ $item["Sigla"] }}</td>
                                <td>{{ $item["Curso"] }}</td>
                                <td>{{ $item["Creditos"] }}</td>
                                <td>{{ $item["Nota"] }}</td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
            </p>
        </div>
    </div>
</div>
        
        
    </div>
</div>

@endsection