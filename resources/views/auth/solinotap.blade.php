@extends('home')

@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-11 col-lg-9 mb-4">
        <h3 class="text-center mb-0" >Notas Pendientes de evaluación</h3>
            <h5 class="card-title text-center">La "Nota P" es la calificación utilizada en una determinada asignatura cuando no ha sido posible cumplir con la evaluación final del curso dentro de los plazos establecidos en el Calendario Académico.

La “Nota P” sólo podrá ser solicitada si se ha cumplido con al menos el 60% de las actividades y evaluaciones del curso.

Es responsabilidad de el o la estudiante que ha solicitado la “Nota P” completar la o las evaluaciones no rendidas, lo que permitirá reemplazar la “Nota P” por la calificación correspondiente. Si el o la estudiante no cumple dichas exigencias será calificado con nota uno (1,0).

El plazo máximo para mantener una “Nota P” será de un año.

Para mayor información puedes solicitar el reglamento de Nota P del alumno de pregrado a dara@uct.cl o bien descargarlo del sitio web: https://dara.uct.cl</h5>
            <hr>

<!-- Realizar solicitud-->
  <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
      Realizar solicitud
      </button>
    </h2>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Nueva solicitud</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Prórroga</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <h3 class="text-center">DATOS DE LA SOLICITUD</h3>

<div class="table-responsive rounded-top shadow mb-5">
<table class="table table-bordered">
     <tr>
      <th scope="row" >ESTUDIANTE</th>
      <td>Catalina Roxana Diaz Saez</td>
    </tr>
    <tr>
      <th scope="row">RUT</th>
      <td>12.456.456-6</td>
      <th scope="row" >REGISTRO</th>
      <td>2019456784</td>
    </tr>
    <tr>
      <th scope="row" >CARRERA</th>
      <td>2019</td>
    </tr>
    <tr>
      <th scope="row" >PLAN</th>
      <td>3</td>
    </tr>
    <tr>
      <th scope="row">MENCION</th>
      <td>DESARROLLO DE SOFTWARE</td>
    </tr>
</table>
</div>
  <h6 class="text-center mb-4">Cursos inscritos en el semestre 2 año 2022</h6>
     <h6 class="fw-light">Selecciona el o los cursos que deseas solicitar</h6>
        <div class="table-responsive rounded-top shadow mb-5">
          <table class="table text-center mb-0">
          <thead class="thead table-primary">
          <tr>
              <th scope="col">Sel.</th>
              <th scope="col">Sigla</th>
              <th scope="col">Curso</th>
              <th scope="col">Sección</th>
              <th scope="col">Año</th>
          </tr>
            </thead>
           <tbody>
            <tr>
            <td>
            <div>
            <input class="form-check-input" type="checkbox" id="checkbox1" value="1" aria-label="...">
            </div>
            </td>
            <td>INFO1197</td>
            <td>Trabajo de título</td>
            <td>1</td>
            <td>2022</td>
            </tr>
          <tr>
            <td>
            <div>
            <input class="form-check-input" type="checkbox" id="checkbox2" value="2" aria-label="...">
          </div>
          </td>
          <td>INFO1173</td>
         <td>Taller de integración IV</td>
        <td>1</td>
        <td>2022</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <h3 class="text-center">DATOS DE LA SOLICITUD</h3>

<div class="table-responsive rounded-top shadow mb-5">
<table class="table table-bordered">
     <tr>
      <th scope="row" class="">ESTUDIANTE</th>
      <td>Catalina Roxana Diaz Saez</td>
    </tr>
    <tr>
      <th scope="row">RUT</th>
      <td>12.456.456-6</td>
      <th scope="row">REGISTRO</th>
      <td>2019456784</td>
    </tr>
    <tr>
      <th scope="row">CARRERA</th>
      <td>2019</td>
    </tr>
    <tr>
      <th scope="row">PLAN</th>
      <td>3</td>
    </tr>
    <tr>
      <th scope="row">MENCION</th>
      <td>DESARROLLO DE SOFTWARE</td>
    </tr>
</table>
</div>
  <h6 class="text-center mb-4">Cursos con nota pendiente</h6>
  <h6 class="fw-light">Selecciona el o los cursos que deseas solicitar</h6>
 <div class="table-responsive rounded-top shadow mb-5">
  <table class="table text-center mb-0">
  <thead class="thead table-primary">
  <tr>
   <th scope="col">Sel.</th>
   <th scope="col">Sigla</th>
   <th scope="col">Curso</th>
   <th scope="col">Sección</th>
   <th scope="col">Año</th>
   </tr>
   </thead>
   <tbody>
   <tr>
   <td>
   <div>
   <input class="form-check-input" type="checkbox" id="checkbox1" value="1" aria-label="...">
   </div>
   </td>
   <td>INFO1173</td>
   <td>Taller de integración IV</td>
   <td>1</td>
   <td>2022</td>
  </tr>
  </tbody>
  </table>
  </div>
  <div>
      <select class="form-select mb-2">
   <option selected>Seleccione el motivo</option>
   <option value="1">Académico</option>
   <option value="2">Cambio de universidad</option>
   <option value="3">Cambio interno UCT</option>
   <option value="4">Disconformidad carrera</option>
   <option value="5">Disconformidad universidad</option>
   <option value="6">Económicos</option>
   <option value="7">Hijos</option>
   <option value="8">Otros</option>
   <option value="9">Personales</option>
   <option value="10">Salud</option>
   <option value="11">Traslado</option>
   <option value="12">Vocación</option>
  </select>
</div>
  <div class="mb-5">
  <label for="exampleFormControlTextarea1" class="form-label mb-0">Observación</label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <p class="text-secondary">(Máx. 600 caracteres. Además se han bloqueado algunos caracteres especiales por temas de seguridad, ejemplo: * +-&%# ' ")
    </p>
  </div>
   <h6 class="fw-light mb-2">Puedes subir archivos que respalden tu solicitud:</h6>
   <div class="mb-1">   
   <input class="form-control" type="file" id="formFileMultiple" multiple>
   </div>
   <p class="text-secondary">(Máximo 3 archivos, en formato PDF con un tamaño máx. de 5 MB.)</p>
  <div class="text-center">
  <a class="btn btn-primary mt-2" type="submit">Enviar</a>
   </div>
</div>
  </div>
</div>
</div>
</div>
</div>


<!-- Solicitudes realizadas y resultados-->

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Solicitudes realizadas y resultados
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="col-auto mb-4">
      <select class="form-select" aria-label="Default select example">
  <option selected>Ingenieria civil en informatica</option>
  <option value="1">Ingeniera civil en informatica</option>

</select>
</div>
<h3 class="text-center">DATOS DE LA SOLICITUD</h3>

<div class="table-responsive rounded-top shadow mb-5">
<table class="table table-bordered">
     <tr>
      <th scope="row" class="">ESTUDIANTE</th>
      <td>Catalina Roxana Diaz Saez</td>
    </tr>
    <tr>
      <th scope="row">RUT</th>
      <td>12.456.456-6</td>
      <th scope="row">REGISTRO</th>
      <td>2019456784</td>
    </tr>
    <tr>
      <th scope="row">CARRERA</th>
      <td>2019</td>
    </tr>
    <tr>
      <th scope="row">PLAN</th>
      <td>3</td>
    </tr>
    <tr>
      <th scope="row">MENCION</th>
      <td>DESARROLLO DE SOFTWARE</td>
    </tr>
</table>
</div>
      <div class="card-text">


      <div class="table-responsive rounded-top shadow mb-5">
             <table class="table text-center">
                <thead class="table-primary">
                    <tr>
                        <th>RUT</th>
                        <th>NOMBRE</th>

                    </tr>
                        </thead>
                        <tbody >
                    <tr>
                    <td>12.456.456-6</td>
                    <td>Catalina Roxana Diaz Saez</td>

                    </tbody>
                    </table>
</div>  
                 <h4 class="text-center">SOLICITUDES REALIZADAS</h4>
                <div class="table-responsive rounded-top shadow mt-5 ">
                    <table class="table">
                        <thead class="table-primary">
                            <th>Año</th>
                            <th>Semestre</th>
                            <th>Fecha</th>
                            <th>Tipo Solicitud</th>
                            <th>Estado</th>
                            <th>Ver pdf</th>

                        </thead>
                        <tbody>
                        @foreach ($query as $item)
                            <tr>
                                <td>{{ $item->anio }}</td>
                                <td>{{ $item->semestre }}</td>
                                <td>{{ $item->fecha }}</td>
                                <td>{{ $item->tip_solicitud }}</td>
                                <td>{{ $item->estado }}</td>
                                <td>{{ $item->pdf }}</td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
                
            </div>
    </div>
</div>
      </div>
    </div>
  </div>
  
</div>
</div>
</div>
@endsection


                   