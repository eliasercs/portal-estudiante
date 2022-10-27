@extends('home')

@section('content')

<h1>Eliminar cursos</h1>

<div class="table">
    <table class="table table-bordered">
        <thead>
            <th>Sigla</th>
            <th>Nombre</th>
            <th>Créditos</th>
            <th>Tipo</th>
            <th>Sección</th>
            <th>Profesor</th>
            <th>Horario</th>
            <th>Sala</th>
            <th>Año</th>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso['Sigla'] }}</td>
                    <td>{{ $curso['Curso'] }}</td>
                    <td>{{ $curso['Creditos'] }}</td>
                    <td>{{ $curso['Tipo'] }}</td>
                    <td>{{ $curso['Seccion'] }}</td>
                    <td>{{ $curso['Profesor'] }}</td>
                    <td>{{ $curso['Horario'] }}</td>
                    <td>{{ $curso['Sala'] }}</td>
                    <td>{{ $curso['Año'] }}</td>
                    <td>
                        <form action="/course/delete" method="post">
                            @csrf
                            <input type="hidden" name="curso_id" value="{{ $curso['id'] }}">
                            <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                            <button class="btn btn-primary" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection