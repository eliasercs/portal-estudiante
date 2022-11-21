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
        
        <h2 class="alert alert-primary bg-primary text-white">Datos de reserva</h2>
        <p>La reserva quedará agendada en el campus: <b class="text-danger">CAMPUS SAN JUAN PABLO II</b></p>
        @if (auth()->user()->Horas)
            <div class="alert alert-warning">Actualmente ya tiene registrada una hora, la hora inscrita se cambiara reemplazara la hora actual</div>
        @endif
            <p>1. Seleccione un Asistente para la reserva.</p>
            <form action="/reservar" method="post">
                @csrf
                <select name="asistente" id="asistente">
                    <option value='' disabled selected>Seleccione</option>
                    @foreach($asistentes as $i)
                        <option value="{{ $i->id }}">{{ $i->Nombre }}</option>
                    @endforeach
                </select><br><br>
            <p>2. Seleccione una fecha para reserva.</p>
            <p>Fecha<select name="dia" id="dia"></select></p>
            <p>Hora<select name="hora" id="hora"></select></p>
            <button class="btn btn-success" type="submit">
                    Reservar
            </buttom>

    </div>
</div>

<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('asistente').addEventListener('change',(e)=>{
        let data={
        'data': e.target.value,
        }
        console.log(JSON.stringify(data))
        fetch('dias',{
            method : 'POST',
            body: JSON.stringify(data),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response =>{
            //console.log(response)
            return response.json()
        }).then( data =>{
            
            var opciones ="<option value='' disabled selected>Seleccione</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i]+'">'+data.lista[i]+'</option>';
            }
            //console.log(opciones)
            document.getElementById("dia").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

    document.getElementById('dia').addEventListener('change',(e)=>{
        let data={
        'data': e.target.value,
        'asis': document.getElementById('asistente').value,
        }
        fetch('horas',{
            method : 'POST',
            body: JSON.stringify(data),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        })
        .then(response =>{
            console.log(response)
            return response.json()
        }).then( datos =>{
            var opciones ="<option value='' disabled selected>Seleccione</option>";
            for (let i in datos.lista) {
                console.log(datos.lista[i].id)
               opciones+= '<option value="'+datos.lista[i].id+'">'+datos.lista[i].Hora.substring(0, 8)+'</option>';
            }
            document.getElementById("hora").innerHTML = opciones;
            document.getElementById("send").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

</script>

@endsection