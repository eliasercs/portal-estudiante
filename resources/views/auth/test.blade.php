@extends('home')
@section('content')

<div class="center" style="display: flex; flex-direction: wrap; justify-content: center;">

    <div class="col-lg-7 justify-content-center">

        <div class="px-lg-5 py-lg-4 p-4 align-self-center">
            <h2>Horas Asistente Social</h2>
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

        <p>
        En esta sección podrás realizar una reserva de hora con un/a asistente social donde se realizan las clases de tu carrera. 
        Debes considerar que una reserva debe hacerse con <b class="text-danger"> 24 horas de antelación (de Lunes a Viernes)</b> y sólo se podrá realizar <b class="text-danger">una reserva
        cada 15 días</b> a través de este medio. La atención será a través de videollamada, ya que se encuentran suspendidas las atenciones 
        presenciales de forma indefinida.
        </p>

        @if (auth()->user()->Horas)
        <h5 class="alert alert-primary bg-primary text-white">Hora Actual Inscrita</h5>

        <p class="card-text">
            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <th>Asistente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </thead>

                    <tbody>
                        <td>{{ auth()->user()->Horas->Hours->Ast[0]->Nombre }}</td>
                        <td>{{ auth()->user()->Horas->Hours->Fecha }}</td>
                        <td>{{ $H }}</td>
                        <td>
                            <form action="/hour/delete" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ auth()->user()->Horas->id }}">
                            <button class="btn btn-danger">Eliminar
                            </button>
                        </form>
                        </td>
                    </tbody>

                </table>
            </div>
        </p>
        @endif
        <h2 class="alert alert-primary bg-primary text-white" >Reservar una hora</h2>

            <div class="table">
            <table class="table">
            <thead class="bg-info">
                <th class="text-white">Rut</th>
                <th class="text-white">Nombre</th>
            </thead>     
            <tbody>   
                <td>{{ auth()->user()->rut }}</td>
                <td>{{ auth()->user()->name }}</td>
            </table>
            </div>
            <h2 style="color: black;">Selecciona una Carrera:</h2>

      <form action="{{ $route }}" method="post">
        @csrf
        <select class="form-select" aria-label="Default select example" name="data">
        <option selected value="default">Seleccione una carrera</option>
        @foreach ($Academic_Records as $Academic_Record)
            <option value="{{ $Academic_Record->id }}">{{ $Academic_Record->Carrera->nombre }}</option>
        @endforeach
      </select>

        <button class="btn btn-primary" type="submit">Acceder</button>
      </form>
    </div>
  </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('status') == 'ok')
    
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Hora Reservada',
    })
  </script>
  @endif

@if (session('status') == 'error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'No se ha logrado reservar la hora, intentelo luego mas tarde',
    })
  </script>
@endif

@if (session('delete') == 'ok')
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Se ha anulado la reserva',
    })
  </script>
@endif

@if (session('delete') == 'error')
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'No se ha logrado anular la inscripcion, intentelo luego mas tarde',
    })
  </script>
@endif
@endsection
