@extends('home')
@section('content')
<body>
    <div>

    </div>
    
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

            @if (auth()->user()->Horas)
            <h2 class="card-title text-center">Hora Actual Inscrita</h2>
            <div class="table">
            <table class="table table-bordered">
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
            </table>
            </div>
            @endif
            <h2 class="card-title text-center">Datos de reserva</h2>
            <p>La reserva quedará agendada en el campus: <b class="subred">CAMPUS SAN JUAN PABLO II</b></p><br>
            @if (auth()->user()->Horas)
            <p>Actualmente ya tiene registrada una hora, la hora inscrita se cambiara reemplazara la hora actual<br><br>
            @endif
            <p>1. Seleccione un Asistente para la reserva.</p><br>
            <form action="/reservar" method="post">
                @csrf
                <select name="asistente" id="asistente">
                    @foreach($asistentes as $i)
                        <option value="{{ $i->id }}">{{ $i->Nombre }}</option>
                    @endforeach
                </select><br><br>
            <p>2. Seleccione una fecha para reserva.</p><br>
            <p>Fecha<select name="dia" id="dia"></select></p><br>
            <p>Hora<select name="hora" id="hora"></select></p><br>
            <button class="btn btn-success" type="submit">
                    Reservar
            </buttom>
            
  
                    
        </div>
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
            
            var opciones ="<option value=''>Seleccione</option>";
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
            var opciones ="<option value=''>Seleccione</option>";
            for (let i in datos.lista) {
                console.log(datos.lista[i].id)
               opciones+= '<option value="'+datos.lista[i].id+'">'+datos.lista[i].Hora.substring(0, 8)+'</option>';
            }
            document.getElementById("hora").innerHTML = opciones;
            document.getElementById("send").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

</script>   

</body>
</html>
@endsection