<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos inscritos</title>
</head>
<body>
<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
    rounded-lg shadow-lg">
  <section>
    <div class="row g-0">
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
            <h5 class="card-title text-center">Cursos Inscritos</h5>
            <hr>
            <div class="card-text">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <th>Fecha</th>
                            <th>Curso</th>
                            <th>Sigla</th>
                            <th>Creditos</th>
                            <th>Tipo</th>
                            <th>Seccion</th>
                            <th>Profesor</th>
                            <th>Horario</th>
                            <th>Sala</th>

                        </thead>
                        <tbody>
                        @foreach ($cursos as $item)
                            <tr>
                                <td>{{ $item->fecha }}</td>
                                <td>{{ $item->Curso }}</td>
                                <td>{{ $item->Sigla }}</td>
                                <td>{{ $item->Creditos}}</td>
                                <td>{{ $item->Tipo }}</td>
                                <td>{{ $item->Seccion }}</td>
                                <td>{{ $item->Profesor }}</td>
                                <td>{{ $item->Horario }}</td>
                                <td>{{ $item->Sala }}</td>


                                
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
                
            </div>
        </div>
    </div>
</div>
</body>
</html>