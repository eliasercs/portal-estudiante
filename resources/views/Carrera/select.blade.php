@extends('home')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center select-container m-auto">
        <div class="col-auto">
            <p>Para continuar con el proceso, usted debe <strong>seleccionar una carrera:</strong></p>
            <form action="{{ $route }}" method="post">
                @csrf
                <select class="form-select mb-3" aria-label="Default select example" name="data">
                    <option selected value="default">Seleccione una carrera</option>
                    @foreach ($Academic_Records as $Academic_Record)
                    <option value="{{ $Academic_Record->id }}">{{ $Academic_Record->Carrera->nombre }}</option>
                    @endforeach
                </select>

                <button class="btn btn-primary w-100" type="submit">Acceder</button>
            </form>
        </div>
    </div>
</div>

@endsection