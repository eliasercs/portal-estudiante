@extends('layout.app')

@section('title', 'Login')

@section('content')

<div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center" style="background-color: cyan;">

  <h1 class="text-3xl text-center font-bold" style="background-color: yellow;">Recuperar contraseña</h1>

  <form class="mt-4" method="POST" action="{{ route('password.email') }}">
    @csrf
     
    <div class="form-outline text-center mb-4">
      <label class="form-label">Se enviarán todas las intrucciones de recuperación
        a su correo electrónico</label> <br>
      </label>
    </div>

    <! -- Email input -->

    <div class="form-outline text-center">
      <label class="form-label">✉️Email</label>
      <input type="email" class="form-control form-control-lg border-0 w-50" placeholder="Ingrese su correo instutional"
        id="email" name="email" :value="old('email')">
    </div>

    <! -- Submit button -->

    <div class="d-grip gap-2 text-center mt-4">
      <button type="submit" class="btn btn-primary" style="border-radius: 1rem;">Enviar Contraseña</button>
    </div>
      


  </form>

</div>

@endsection

