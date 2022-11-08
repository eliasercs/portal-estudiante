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

        <h5 class="card-tittle text-center">Elige una Hora</h5>
        <p>
            Esto fue diseñado mediante laravel fetch (ajax), en donde al seleccionar un asistente, se cargaran los dias que atendera,
                luego al seleccionar un dia se cargaran las horas disponibles (se ocultan las horas ocupadas), para que luego el usuario
                envie la consulta y se registre en la base de datos (solo puede tener una reserva activa a la vez).
        </p>

        <p>
            PD: En el portal actual deja elegir horas para el proximo dia habil, yo lo configure para elegir dentro de un mes
        </p>

        @if (auth()->user()->Horas)
        <h5 class="card-tittle text-center">Hora Actual Inscrita</h5>

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
                        <td>{{ auth()->user()->Horas->Hours->Hora }}</td>
                        <td>
                            <form action="#" method="POST">
                            @csrf
                            <button class="btn btn-danger">Eliminar
                            </button>
                            </form>
                        </td>
                    </tbody>

                </table>
            </div>
        </p>
        @endif

        <form action="/reservar" method="post">
            @csrf
            <select name="asistente" id="asistente">
                @foreach($asistentes as $i)
                    <option value="{{ $i->id }}">{{ $i->Nombre }}</option>
                @endforeach
            </select>
            <select name="dia" id="dia"></select>
            <select name="hora" id="hora"></select>
            <button class="btn btn-success" type="submit">
                Enviar
            </button>
        </form>

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

@endsection