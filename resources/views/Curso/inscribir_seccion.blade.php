@extends('home')

@section('content')

<div>
    <h1>Información del curso</h1>

    <ul>Nombre: <strong>{{ $curso->nombre }}</strong></ul>
    <ul>Código: <strong>{{ $curso->code }}</strong></ul>
    <ul>Créditos: <strong>{{ $curso->creditos }}</strong></ul>
    <ul>Tipo de curso: <strong>{{ $curso->tipo }}</strong></ul>

    <div class="table">
        <table class="table table-bordered">
            <thead>
                <th>Sigla</th>
                <th>Curso</th>
                <th>Sección</th>
                <th>Profesor</th>
                <th>Horario</th>
                <th>Sala</th>
                <th>Capacidad</th>
                <th>Inscritos</th>
            </thead>
            <tbody>    
                @foreach ($secciones as $seccion)
                    <tr>
                        <td>{{ $curso["code"] }}</td>
                        <td>{{ $curso["nombre"] }}</td>
                        <td>{{ $seccion["numero"] }}</td>
                        <td>{{ $seccion["profesor"] }}</td>
                        <td>{{ $seccion["horario"] }}</td>
                        <td>{{ $seccion["sala"] }}</td>
                        <td>{{ $seccion["capacidad"] }}</td>
                        <td>{{ $seccion["inscritos"] }}</td>
                        <td>
                            <form action="/inscribir/curso" method="post">
                                @csrf
                                <input type="hidden" name="seccion_id" value="{{ $seccion['id'] }}">
                                <input type="hidden" name="academic_record_id" value="{{ $academic_record_id }}">
                                @if(!in_array($seccion["id"],$inscrito))
                                <button class="btn btn-primary" type="submit">
                                    Inscribir
                                </buttom>
                                @else
                                <button class="btn btn-primary" disabled type="submit">
                                    Inscrito
                                </buttom>
                                @endif
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</div>

@endsection