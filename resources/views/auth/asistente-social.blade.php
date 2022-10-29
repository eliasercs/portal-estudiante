@extends('home')

@section('title', 'Horas Asistente Social')

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
            <div class="table table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>Asistente</th>
                            <th>Fecha</th>
                        </thead>
                        <tbody>
                        @foreach ($org as $h)
                            <tr>
                                <td>{{ $h->Asistente }}</td>
                                <td>{{ $h->Horario }}</td>
                                <td>
                                <form action="#" method="POST">
                                    @csrf
                                    <button class="btn btn-danger">Inscribir
                                        <span class="fas fa-user-times"></span>
                                    </button>
                                </form>
                            </td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>       

    </select>
                
            
        </div>
    </div>
</div>



@endsection