@extends('layouts.appInicio')

@section('content')
<div class="container">
      <!-- Jumbotron -->
      <h1>Empresa BLUETECH</h1>

      <div class="jumbotron">
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src=" {{ asset('Imagenes/img1.png') }}" alt="First slide" witch ="300px" height ="300px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src=" {{ asset('Imagenes/img2.png') }}" alt="Second slide" witch ="450px" height ="500px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src=" {{ asset('Imagenes/img3.png') }}" alt="Third slide" witch ="450px" height ="500px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Misión</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="https://v4-alpha.getbootstrap.com/examples/justified-nav/#" role="button">View details »</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Visión</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="https://v4-alpha.getbootstrap.com/examples/justified-nav/#" role="button">View details »</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Nosotros</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn btn-primary" href="https://v4-alpha.getbootstrap.com/examples/justified-nav/#" role="button">View details »</a></p>
        </div>
      </div>
      </div>

      

@endsection
