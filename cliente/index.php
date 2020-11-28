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
<nav class="navbar navbar-expand-sm navbar-light  border border" >
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active text-primary">
        <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline col-xs-12 bg-darck">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../imagenes/fuentes/baner.jpg" alt="First slide" style="height: 200px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../imagenes/fuentes/bamer2.jpg" alt="Second slide" style="height: 200px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../imagenes/fuentes/baner3.jpg" alt="Third slide" style="height: 200px;">
    </div>
  </div>
</div>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/popper.min.js"></script>
</body>
</html>