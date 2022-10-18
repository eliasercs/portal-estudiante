@extends('layout.app')

@section('title', 'Notas')

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
            <h2 style="color: white;">Notas</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif        
                </div>
            </div>
            <h5 class="card-title text-center">Notas de {{ auth()->user()->name }} </h5>
            <hr>
            <p class="card-text">
                <div class="table table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>Nota</th>
                            <th>Fecha</th>
                            <th>porcentaje</th> 
                        </thead>
                        <tbody>
                        @foreach ($notas as $item)
                            <tr>
                                <td>{{ $item->nota }}</td>
                                <td>{{ $item->fecha }}</td>
                                <td>{{ $item->porcentaje }}</td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
            </p>
        </div>
    </div>
</div>



@endsection