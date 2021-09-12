<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>index | Test Mvc Faiza!</title>
  </head>
  <body>
   <header>
     <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow ">
     <div class="container-fluid my-2">
    <a class="navbar-brand  text-light" href="#" style= "color:black">Faiza Blog</a>
    <form action="" class="form-inline my-2 my-lg-0" methode="GET">
      <input class="form-control mr-sm-2 bg-dark" type="search" placeholder="find something">
    </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class=" text -monospace nav-link" href="http://mvc">Index <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class=" text-monospace nav-link" href="http://mvc/contact">Contact</a>
      </li>
      
   
    </ul>


     </div>
     </nav>
   </header>
 
  <main role="main">
    <?= $pageContent ?>
  </main>
  

    <hr class="my-5">

    <footer class="container mt-5">
      <div class="row">
        <div class="col">
        <h1>Hello</h1>
        <p>Hi i'm Faiza 35years old,web developper </p>
        </div>
        <div class="col">
          <h1>Insight</h1>
          <a href="#"> Virtual Box</a>
          <a href="#"> Linux</a>
        </div>
        <div class="col">
        <h1>Ressources</h1>
          <a href="#"> Virtual Box</a>
          <a href="#"> Linux</a>
        </div>
        <div class="col">
        <h1>Links</h1>
          <a href="#"> Contact</a>
          <a href="#"> Privacy policy</a>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <p>@<?php echo date("Y");?> <a href="#">Faiza Berrichi</a> All right reserved</p>
      </div></div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
  </body>
</html>