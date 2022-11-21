@extends('layout.app')

@section('title', 'Registrar Usuarios')

@section('headers')
<link rel="stylesheet" href="{{ asset('/css/register.css') }}" >
@endsection

@section('content')

<div class="container-registro">

  <div class="container">

    <div class="row vh-100 align-content-center justify-content-center">

    <div class="col-auto">
    <div class="content-container p-3">
      <h5 class="text-center"><strong>Registro de usuarios</strong></h5>
      <form method="POST" action="">
        @csrf

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nombre y apellidos</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="text" name="name" class="form-control" placeholder="Jhon Doe">
          </div>
          @error('name')        
          <label class="form-label">* {{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Rut</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="text" name="rut" class="form-control" placeholder="XXXXXXXX-X">
          </div>
          @error('rut')        
          <label class="form-label">* {{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="estudiante@alu.uct.cl">
          </div>
          @error('email')        
          <label class="form-label">* {{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="password" name="password" class="form-control" placeholder="*********">
          </div>
          @error('password')        
          <label class="form-label">* {{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Confirmar Contraseña</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="password" name="password_confirmation" class="form-control" placeholder="*********">
          </div>
        </div>

       <button type="submit" class="btn btn-success w-100">Registrar</button>


      </form>
    </div>
  </div>

    </div>

  </div>  
  

</div>

@endsection