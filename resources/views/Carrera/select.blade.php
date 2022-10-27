@extends('home')

@section('content')

<form action="{{ $route }}" method="post">
    @csrf
    <select class="form-select" aria-label="Default select example" name="data">
        <option selected value="default">Seleccione una carrera</option>
        @foreach ($Academic_Records as $Academic_Record)
            <option value="{{ $Academic_Record->id }}">{{ $Academic_Record->Carrera->nombre }}</option>
        @endforeach
    </select>

    <button class="btn btn-primary" type="submit">Acceder</button>
</form>

@endsection