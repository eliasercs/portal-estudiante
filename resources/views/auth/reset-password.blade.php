@extends('layout.app')

@section('title', 'reset')

@section('content')
  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">
  <section>
    <div class="row g-0">
      <div class="col-lg-5 d-flex flex-column justify-content-center min-vh-100">
        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
          <img src="../img/logo.png" alt="logo" class="img-fluid">
        </div>

        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
            <h2 style="color: white;">Recuperar contraseña</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-outline mb-4 flex-nowrap">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" class="login__label" type="email" name="email" class="form-control form-control-lg border-0" :value="old('email', $request->email)" required autofocus disabled/>
                </div>

                <!-- Password -->
                <div class="form-outline mb-4 flex-nowrap">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="login__label" type="password" name="password" class="form-control form-control-lg border-0" required />
                </div>

                <!-- Confirm Password -->
                <div class="form-outline mb-4 flex-nowrap">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="login__label"
                                        type="password"
                                        name="password_confirmation" required />
                </div>

                <div class="d-grip gap-2" >
                    <x-primary-button class="login_submit" style="border-radius: 1rem; width: 100%">
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection
