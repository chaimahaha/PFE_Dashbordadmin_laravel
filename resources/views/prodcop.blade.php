<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTIONs ET COOPERATIONs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" >
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap');
    </style>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
      .dropdown:hover .dropdown-menu{
        display: block;
      }
      .dropdown-menu{
        margin-top: 0;
      }
    </style>
  <script>
    $(document).ready(function(){
      $(".dropdown").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
        }
    });
});     
</script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light  sticky-top " style="background-color:#EEEEEE;" >
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"  style="color:#0d47a1"> 
            Présentation
          </a>  
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="theme"  style="color:#0d47a1"> 
            Théme de recherche
          </a>  
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pub"  style="color:#0d47a1"> 
            Publications
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="prodcop"  style="color:#0d47a1">
            Production  et coopération
          </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="manif"  style="color:#0d47a1">
          Manifestation
          </a>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="actualites"  style="color:#0d47a1">
          Actualités
          </a>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> S&apos;inscrire</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
    </div>
  </div>
  <div >
   
   
</div>
  
</nav>
<div >
  <img src="img\chh.jpg" alt="" id="image" class="wow fadeInRight rounded" width="100%" height="150px">
</div>
<div class="d-flex justify-content-center mt-3">
  <button class="btn btn-outline-danger mx-2" onclick="showHab()">Habilitations</button>
  <button class="btn btn-outline-info mx-2" onclick="showMaster()">Masters</button>
  <button class="btn btn-outline-warning mx-2" onclick="showPfe()">PFE</button>
  <button class="btn btn-outline-success mx-2" onclick="showThese()">Theses</button>
  <button class="btn btn-outline-primary mx-2" onclick="showCoop()">Coopération</button>
</div>
<div class="container">
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown" id="hab" style="display: block" >
    <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Habilitations</div>
      <div class="card-body wow fadeInDown ">
        <div class="table-responsive table" id="search" >
          <table id="paper_table" class="table table-striped" >
            <thead  class="table-danger  ">
              <tr>
                  <th >#</th>
                  <th>Titre</th>
                  <th>Nom & Prenom</th>
                  <th>Année</th>
                  <th>Encadrants</th>
                  <th >Date</th>                                       
              </tr>
            </thead>
            <tbody class="table-light">
              @foreach($habilitations as $hab)
              <tr>
                    <td> {{$hab->id}} </td>
                    <td> {{$hab->titre}} </td>
                    <td> {{$hab->nom}} </td>
                    <td> {{$hab->annee}} </td>
                    <td> {{$hab->encadrant}} </td>
                    <td> {{$hab->date}} </td>
              </tr>
              @endforeach     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown" id="master" style="display: none" >
    <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Masters</div>
      <div class="card-body wow fadeInDown ">
        <div class="table-responsive table" id="search" >
          <table id="paper_table" class="table table-striped" >
            <thead  class="table-info  ">
              <tr>
                  <th >#</th>
                  <th>Titre</th>
                  <th>Année</th>
                  <th>Sujet</th>
                  <th>Nom & Prenom</th>
                  <th>Encadrants</th>
                  <th>Institution</th>                                       
              </tr>
            </thead>
            <tbody class="table-light">
              @foreach($masters as $master)
              <tr>
                    <td> {{$master->id}} </td>
                    <td> {{$master->titre}} </td>
                    <td> {{$master->annee}} </td>
                    <td>{{$master->description}}</td>
                    <td> {{$master->etudiant}} </td>
                    <td> {{$master->encadrant}},{{$master->encadrant_2}} </td>
                    <td> {{$master->institut}} </td>
              </tr>
              @endforeach     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown" id="pfe" style="display: none" >
    <div class="card-header text-center fw-bold fs-4" style="color:#22577E">PFE</div>
      <div class="card-body wow fadeInDown ">
        <div class="table-responsive table" id="search" >
          <table id="paper_table" class="table table-striped" >
            <thead  class="table-warning  ">
              <tr>
                  <th >#</th>
                  <th>Titre</th>
                  <th>Année</th>
                  <th>Sujet</th>
                  <th>Nom & Prenom</th>
                  <th>Encadrants</th>
                  <th>Institution</th>                                       
              </tr>
            </thead>
            <tbody class="table-light">
              @foreach($pfes as $pfe)
              <tr>
                    <td> {{$pfe->id}} </td>
                    <td> {{$pfe->titre}} </td>
                    <td> {{$pfe->annee}} </td>
                    <td>{{$pfe->description}}</td>
                    <td> {{$pfe->etudiant}} </td>
                    <td> {{$pfe->encadrant}},{{$pfe->encadrant_2}} </td>
                    <td> {{$pfe->institut}} </td>
              </tr>
              @endforeach     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown" id="these" style="display: none" >
    <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Théses</div>
      <div class="card-body wow fadeInDown ">
        <div class="table-responsive table" id="search" >
          <table id="paper_table" class="table table-striped" >
            <thead  class="table-success  ">
              <tr>
                  <th >#</th>
                  <th>Titre</th>
                  <th>Année</th>
                  <th>Sujet</th>
                  <th>Année d'inscription</th>
                  <th>Encadrants</th>
                  <th>Cotutelle</th>                                       
              </tr>
            </thead>
            <tbody class="table-light">
              @foreach($theses as $these)
              <tr>
                    <td> {{$these->id}} </td>
                    <td> {{$these->titre}} </td>
                    <td> {{$these->annee}} </td>
                    <td>{{$these->sujet}}</td>
                    <td> {{$these->anneeinscrip}} </td>
                    <td> {{$these->encadrant}},{{$these->encadrant_2}} </td>
                    <td> {{$these->cotutelle}} </td>
              </tr>
              @endforeach     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
      <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  " id="coop" style="display: none">
          <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Coopérations</div>
            <div class="card-body ">
              <div class="table-responsive table" id="search" >
                <table class="table">
                  <thead>
                    <tr class="table-info">
                      <th>Id</th>
                      <th>Type</th>
                      <th>Institution</th>
                      <th>Intervenant</th>
                      <th>Date debut</th>
                      <th>Date fin</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach ($cooperations as $coop)
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                      <strong>{{$coop->id}}</strong></td>
                      <td>{{$coop->type}}</td>
                      <td>{{$coop->institution}}</td>
                      <td>{{$coop->intervenantnat}}, {{$coop->intervenantin}}</td>
                      <td>{{$coop->date_start}}</td>
                      <td>{{$coop->date_end}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
    </div>
</div>
</div>
<script>
  let hab = document.getElementById('hab');
  let master = document.getElementById('master');
  let pfe = document.getElementById('pfe');
  let these = document.getElementById('these');
  let coop = document.getElementById('coop');
  function showHab(){
    if(hab.style.display === "none"){
      hab.style.display="block";
      master.style.display="none"; 
      pfe.style.display="none"; 
      these.style.display="none"; 
      coop.style.display="none"; 
  }
}
function showMaster(){
    if(master.style.display === "none"){
      master.style.display="block";   
      pfe.style.display="none"; 
      these.style.display="none"; 
      coop.style.display="none"; 
      hab.style.display="none"; 
  }
}
function showPfe(){
    if(pfe.style.display === "none"){
      pfe.style.display="block";      
      these.style.display="none"; 
      coop.style.display="none"; 
      hab.style.display="none"; 
      master.style.display="none"; 
  }
}
function showThese(){
    if(these.style.display === "none"){
      these.style.display="block";
      coop.style.display="none"; 
      hab.style.display="none"; 
      master.style.display="none"; 
      pfe.style.display="none"; 
  }
}
function showCoop(){
  if(coop.style.display === 'none'){
      coop.style.display='block';
      hab.style.display="none";
      master.style.display="none"; 
      pfe.style.display="none"; 
      these.style.display="none"; 
     
  }
}
</script>
 <!-- Footer -->
 <footer class="text-center text-lg-start  text-muted mt-5" style="background-color:#EEEEEE;">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block" style="color:#0d47a1">
        <span>Connectez-vous avec nous sur nos réseaux sociaux:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="https://www.facebook.com/profile.php?id=100064651552198" class="me-4 text-reset" target="_blank">
          <i class="fa fa-facebook-square"></i>
        </a>
        <a href="http://www.setit.rnu.tn/URSETIT/" class="me-4 text-reset" target="_blank">
          <i class="fa fa-google"></i>
        </a>
        
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
 
          <!-- Grid column -->
          <div class="m-4  mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4" style="color:#0d47a1">
              Contact
            </h6>
            <p style="color:#0d47a1"><i class="bi bi-house-door" ></i>   Pour contacter le Directeur de l'unité Mr. Mohamed Salim BOUHLEL :</p>
            <p style="color:#0d47a1">
            <i class="bi bi-envelope"></i> 
                E-mail : medsalim.bouhlel@enis.rnu.tn
            </p>
            <p style="color:#0d47a1"><i class="bi bi-telephone-inbound"></i> Tel : +216 74 674 354</p>
            <p style="color:#0d47a1"><i class="bi bi-newspaper"></i>   Fax : +216 74 674 364</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); color:#0d47a1;" >
      © 2022 Copyright:
      <a class="text-reset fw-bold" href="">SETIT </a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</body>
</html>
