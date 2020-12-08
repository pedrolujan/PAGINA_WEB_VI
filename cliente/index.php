<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    
</head>
<body>
<img src="../imagenes/mi-logo.gif" alt="" srcset="" style="width:80px;">
<nav class="navbar navbar-expand-sm navbar-light bg-dark " >
  <a class="navbar-brand text-white" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto bg-info">
      <li class="nav-item active text-primary">
        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled text-white" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline col-lg-9 bg-primary">
      <input class="form-control col-lg-8 mr-lg-2" type="search" placeholder="Search" aria-label="Search">
      <img class="col-lg-1 d--none  fr-0" src="../imagenes/mi-logo.gif" alt="" srcset="">
    </form>
  </div>
</nav>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../imagenes/fuentes/baner.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../imagenes/fuentes/baner3.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../imagenes/fuentes/baner3.jpg" alt="Third slide" >
    </div>
  </div>
</div>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/popper.min.js"></script>
</body>
</html>