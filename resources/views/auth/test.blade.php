@extends('home')
@section('content')

<div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: black;">Reserva de horas Asistente Social</h2>
        </div>
        <p>
        En esta sección podrás realizar una reserva de hora con un/a asistente social donde se realizan las clases de tu carrera. 
        Debes considerar que una reserva debe hacerse con <b class="subred"> 24 horas de antelación (de Lunes a Viernes)</b> y sólo se podrá realizar <b class="subred">una reserva
        cada 15 días</b> a través de este medio. La atención será a través de videollamada, ya que se encuentran suspendidas las atenciones 
        presenciales de forma indefinida.
        </p>

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
            <h2 style="color: black;">Reservar una hora</h2>
            <div class="table">
            <table class="table table-bordered">
            <thead>
                <th>Rut</th>
                <th>Nombre</th>
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

@endsection
