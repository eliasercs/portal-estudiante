@extends('home')

@section('content')

<script defer src="{{ asset('/js/calendario.js') }}"></script>

<div class="row m-4 justify-content-between">
  <div class="col-md-8 col-lg-7">

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/img/banners_01.png" class="d-block w-100 h-100" alt="banner1">
        </div>
        <div class="carousel-item">
          <img src="/img/banners_02.png" class="d-block w-100 h-100" alt="banner2">
        </div>
        <div class="carousel-item">
          <img src="/img/slider_01.jpg" class="d-block w-100 h-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="col-lg-4 mt-4 mt-md-2 mt-lg-0">
    <div class="calendario-pos">

      <div class="calendar">
        <div class="calendar__info">
          <div class="calendar__prev" id="prev-month">&#9664;</div>
          <div class="calendar__month" id="month">Enero</div>
          <div class="calendar__year" id="year">2022</div>
          <div class="calendar__next" id="next-month">&#9654;</div>
        </div>

        <div class="calendar__week">
          <div class="calendar__day calendar__item">Lun</div>
          <div class="calendar__day calendar__item">Mar</div>
          <div class="calendar__day calendar__item">Mie</div>
          <div class="calendar__day calendar__item">Jue</div>
          <div class="calendar__day calendar__item">Vie</div>
          <div class="calendar__day calendar__item">Sab</div>
          <div class="calendar__day calendar__item">Dom</div>
        </div>

        <div class="calendar__dates" id="dates"></div>
      </div>
    </div>
  </div>

</div>




<div class="icon-dara">
  <a href="/home">
    <img style="width: 200px;" src="{{ asset('/img/logo.png') }}">
  </a>

</div>




@endsection