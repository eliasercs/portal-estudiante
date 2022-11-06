@extends('home')
@section('content')

<div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
    <h2 style="color: black;">Solicitudes Estudiantiles</h2>
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
    En esta sección encontrarás el formulario mediante el cual puedes hacer una solicitud de <b>Reincorporación</b>, 
    <b>Suspensión</b> o <b>Renuncia</b>. Además puedes consultar el estado en que se encuentra tu solicitud <br><br>
    Para visualizar el contenido solo debes hacer click sobre el Título de tu interés el cual desplegará el contenido deseado.
    </p>
    <h2 style="color: black;">Proceso de suspensión <br>Beneficios de arancel MINEDUC 2022</h2>
    <p>
    <b>Estimados Estudiantes: </b><br><br>

Junto con saludar, informamos que desde el <b>02 de Agosto hasta el 29 de Septiembre</b> se encuentra habilitado el 
<b>proceso de suspensión de Beneficios Estudiantiles MINEDUC.</b> <br><br>

SI realizaste suspensión o renuncia académica y cuentas con Gratuidad, Beca de arancel o Fondo Solidario de 
Crédito Universitario (FSCU) debes ingresar al siguiente link <a href=https://forms.gle/LyZ3ZygrS3TEAQjG8>https://forms.gle/LyZ3ZygrS3TEAQjG8</a> y
 completar el formulario online para solicitar la suspensión de tu beneficio, al que podrás ingresar
  solo a través de tu correo electrónico institucional. <br><br>  

Descarga <a href="https://estudiantes.uct.cl/documentos/INSTRUCTIVO_SUSPENSJON_BENEFICIOS_ESTUDIANTES.pdf">AQUÍ</a> el instructivo del proceso de suspensión de Beneficios Estudiantes. <br><br>

<b>Respecto a la carga de documentos en formato PDF, debes considerar lo siguiente:</b> <br>
1. <b>Formulario suspensiones:</b> Solo lo debes cargar en caso de contar con Beca de arancel. Se exime de 
esta obligación a los estudiantes que tengan Gratuidad. <br><br>

2. <b>Documento de respaldo para acreditar motivo de suspensión:</b> Solo lo debes cargar en 
caso de contar con Gratuidad o Becas de arancel, toda vez que las suspensiones totales desde el año 
de asignación del beneficio a la fecha (incluyendo solicitud actual) sean superiores a 02 semestres académicos. 
Se exime de esta obligación a los estudiantes que tengan FSCU. <br><br><br>

<b>*EL PROCESO DE SUSPENSIÓN ES DE EXCLUSIVA RESPONSABILIDAD DEL ESTUDIANTE*</b> <br>
</p>
<h2 style="color: black;">Ingresar Solicitud</h2>
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

<h2 style="color: black;">Beneficios</h2>
    @if ($beneficios)
    <ol>
    @foreach($beneficios as $b)
        <li>{{ $b->beneficio }}</li>
    @endforeach
    </ol>
    @endif

<h2 style="color: black;">Formulario de ingreso de solicitud</h2>

<p><b>Tipo de solicitud:</b> 
<form action="/solicitud" method="post"> 
    @csrf
    <input id="record" name="record" type="hidden" value="{{ $record->id}}">
    <input id="semestre" name="semestre" type="hidden" value="{{$semestre}}">
    <input id="año" name="año" type="hidden" value="{{ $año }}">
    <input id="fecha" name="fecha" type="hidden" value="{{ $now }}">
    <select name="tipo" id="tipo">
    <option value="" disabled selected>Seleccione</option>
    <option value="renuncia">Renuncia</option>
    <option value="suspension">Suspensión</option>
    </select>
</p>
Con Beneficio Estudiantil.	Recordar conversar con la asistente social para informarse de los ajustes de beneficios en los casos de suspensión.
<p>
Fecha de solicitud: {{ $now }}
</p>
<p>
Semestre/Año Solicitud:	
@if($semestre == 1) 
    Primer semestre de {{ $año }}
@else
    Segundo semestre de {{ $año }}
@endif 
</p>

<p>
    Desde <select name=semestre id=semestre disabled>
<option value="{{$semestre}}" disabled selected>
@if($semestre == 1) 
    Primer semestre 
@else
    Segundo semestre 
@endif 
</option>
</select>
<select name="año" id="año" disabled>
<option value="{{ $año }}" disabled selected>{{ $año }}</option>
</select>
</p>
<p>

    motivos <select name="motivo1" id="motivo1">
                <option value="" disabled selected>Seleccione</option>
                <option value="ACADEMICO">ACADEMICO</option>
                <option value="CAMBIO DE UNIVERSIDAD">CAMBIO DE UNIVERSIDAD</option>
                <option value="CAMBIO INTERNO UCT">CAMBIO INTERNO UCT</option>
                <option value="DISCONFORMIDAD CARRERA">DISCONFORMIDAD CARRERA</option>
                <option value="DISCONFORMIDAD UNIVERSIDAD">DISCONFORMIDAD UNIVERSIDAD</option>
                <option value="ECONOMICOS">ECONOMICOS</option>
                <option value="HIJOS">HIJOS</option>
                <option value="OTROS">OTROS</option>
                <option value="PERSONALES">PERSONALES</option>
                <option value="SALUD">SALUD</option>
                <option value="TRASLADO">TRASLADO</option>
                <option value="VOCACION">VOCACION</option>
            </select>
            <select name="motivo2" id="motivo2">
            </select>
</p>
<p>
    detalle motivos <br> <textarea name="detalle" rows="10" cols="50"></textarea>
</p>
<button class="btn btn-success" type="submit">
    Enviar
</button>
</form>
<h2 style="color: black;">Resultados de la solicitud</h2>
<h3 style="color: black;">Estado de solicitudes</h3>

<div class="table">
    <table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Fecha de la solicitud</th>
        <th>Tipo de solicitud</th>
        <th>Estado</th>
        <th>Observacion</th>
        <th>comprobante</th>
    </thead>     
    <tbody>   
    @foreach($sol as $s)
    <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->Fecha }}</td>
        <td>{{ $s->Tipo }}</td>
    <tr>
    @endforeach

    </table>
</div>
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('motivo1').addEventListener('change',(e)=>{
        let data={
        'data': e.target.value,
        }
        console.log(JSON.stringify(data))
        fetch('motivo',{
            method : 'POST',
            body: JSON.stringify(data),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response =>{
            console.log(response)
            return response.json()
        }).then( 
            data =>{     
            var opciones ="<select name='motivos' id='motivos'><option value='' disabled selected>Seleccione</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i]+'">'+data.lista[i]+'</option>';
            }
            opciones += "</select>";
            //console.log(opciones)
            document.getElementById("motivo2").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

</script>   

@endsection