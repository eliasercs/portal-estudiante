@extends('home')

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
            <h2 style="color: white;">Información Academica</h2>
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
            <h5 class="card-title text-center">Estado</h5>
            <hr>
            <p class="card-text">
            <div class="col-lg-7 text-align-center">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <h3 class="text-center">Su carrera es:  {{ $academic_record->Carrera->nombre }}</h3>
                    <h3 class="text-center">Plan: {{ $academic_record->plan }}</h3>
                    <h3 class="text-center">Ingreso: {{ $academic_record->ingreso }}</h3>
                    <h3 class="text-center">Situacion: {{ $academic_record->situacion }}</h3>
                    <h3 class="text-center"> <a href="/imprimir/academic_record={{$academic_record->id}}">Cursos inscritos (PDF) </a> </h3>
                    <h3 class="text-center">Ficha Avance Curricular: <a href=" /descargaFAC/academic_record={{$academic_record->id}}"> Descargar</a></h3>
                </div>
            </div>
            </p>
        </div>
        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: white;">Historia Academica</h2>
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