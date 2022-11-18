<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal del estudiante</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap-settings.css') }}">

</head>

<body>

    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-auto text-center">
                <img class="w-50 mx-auto d-block" src="{{ asset($img) }}" alt="Recurso no encontrado" />

                <h5>{{ $response }}</h5>
                
                <button class="btn btn-danger">
                    <a class="text-white" href="{{ $ref }}" style="text-decoration: none;">Regresar</a>
                </button>
            </div>
        </div>
    </div>

</body>

</html>