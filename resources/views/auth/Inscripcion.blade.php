@extends('layout.app')

@section('title', 'Ramos')

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
            <h2 style="color: black;">Ramos</h2>
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
            <h5 class="card-title text-center">Ramos disponibles para {{ auth()->user()->name }} </h5>
            <hr>
            <p class="card-text">
                <div class="table table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>Codigo</th>
                            <th>Curso</th>
                            <th>Seccion</th>
                            <th>Profesor</th>
                            <th>Horario</th>
                            <th>Sala</th>
                            <th>Capacidad</th>
                            <th>Inscritos</th>
                        </thead>
                        <tbody>
                        @foreach ($ramos as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->numero }}</td>
                                <td>{{ $item->profesor }}</td>
                                <td>{{ $item->horario }}</td>
                                <td>{{ $item->sala }}</td>
                                <td>{{ $item->capacidad }}</td>
                                <td>{{ $item->inscritos }}</td>
                                <td>
                                <form action="{{route('ramos.store', $item->id)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-success">inscribir
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </form>
                                </td>

                                
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {{ $ramos->links() }}
                    </div>
                </div>
            </p>
        </div>
    </div>
</div>



@endsection