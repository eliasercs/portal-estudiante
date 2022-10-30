<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: black;">Horas Asistente Social</h2>
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
            <h5 class="card-title text-center">Elige una hora</h5>
            <p>En proceso de mejora por una en la que halla un input tipo select dependiendo del asistente, el dia y la hora.</p>
            <p>PD: En el portal actual deja elegir horas para el proximo dia habil, yo lo configure para elegir dentro de un mes</p>
            <div>
                <select name="asistente" id="asistente">
                    @foreach($asistentes as $i)
                        <option value="{{ $i->id }}">{{ $i->Nombre }}</option>
                    @endforeach
                    
                </select>
                <select name="dia" id="dia"></select>
                <select name="hora" id="hora"></select>
            </div>  
                    
        </div>
    </div>
</div>
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('asistente').addEventListener('change',(e)=>{
        fetch('dias',{
            method : 'POST',
            body: JSON.stringify({data : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            console.log(response)
            return response.json()
        }).then( data =>{
            console.log(data)
            var opciones ="<option value=''>Seleccione</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre+'</option>';
            }
            console.log(opciones)
            document.getElementById("dia").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

    document.getElementById('dia').addEventListener('change',(e)=>{
        fetch('horas',{
            method : 'POST',
            body: JSON.stringify({data : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        })
        .then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Seleccione</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre+'</option>';
            }
            document.getElementById("horas").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

</script>   

</body>
</html>