@extends('home')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
    rounded-lg shadow-lg">
  <section>
    <div class="row g-0">
      <div class="col-lg-5 d-flex flex-column justify-content-center min-vh-100">
        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
          <img src="./img/logo.png" alt="logo" class="img-fluid">
        </div>

        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: black;">Solicitudes nota P</h2>
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
            <h5 class="card-title text-center">Solicitudes nota P </h5>
            <hr>
            <div class="card-text">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <th>Año</th>
                            <th>Semestre</th>
                            <th>Fecha</th>
                            <th>Tipo Solicitud</th>
                            <th>Estado</th>
                            <th>Ver pdf</th>

                        </thead>
                        <tbody>
                        @foreach ($query as $item)
                            <tr>
                                <td>{{ $item->anio }}</td>
                                <td>{{ $item->semestre }}</td>
                                <td>{{ $item->fecha }}</td>
                                <td>{{ $item->tip_solicitud }}</td>
                                <td>{{ $item->estado }}</td>
                                <td>{{ $item->pdf }}</td>


                                
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



@endsection