<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial academico</title>
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
                    <div align:center>
                        <h1 class="card-title text-center">Historial academico</h1>
                    </div>
                    <hr>
                    <div class="card-text">
                        <div class="table">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Año</th>
                                    <th>Semestre</th>
                                    <th>Sigla</th>
                                    <th>Curso</th>
                                    <th>Creditos</th>
                                    <th>Nota</th>

                                </thead>
                                <tbody>
                                    @foreach ($cursos as $item)
                                    <tr>
                                        <td>{{ $item["Año"] }}</td>
                                        <td>{{ $item["Semestre"] }}</td>
                                        <td>{{ $item["Sigla"] }}</td>
                                        <td>{{ $item["Curso"] }}</td>
                                        <td>{{ $item["Credito"] }}</td>
                                        <td>{{ $item["Nota"] }}</td>
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