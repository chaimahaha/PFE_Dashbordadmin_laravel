<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUBLICATIONS</title>
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
          <li class="nav-item dropdown">
            <a class="nav-link active" aria-current="page" href="actualites"  style="color:#0d47a1">
            Actualités
            </a>
          </li>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="membres"  style="color:#0d47a1">
          Membres
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
                           onclick="ouvnt.prouvntDefault();
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
  <button class="btn btn-outline-danger mx-2" onclick="showConf()">Conférences</button>
  <button class="btn btn-outline-info mx-2" onclick="showArt()">Articles scientifiques</button>
  <button class="btn btn-outline-warning mx-2" onclick="showOuv()">Ouvrages scientifiques</button>
  <button class="btn btn-outline-success mx-2" onclick="showBrev()">Brevets</button>
  <button class="btn btn-outline-dark mx-2" onclick="showChap()">Chapitres d'ouvrages</button>
</div>
<div class="container">             
  <div class="card mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown" id="conf" style="display: block">
      <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Conférence</div>
      <div class="card-body wow fadeInDown ">
          <div class="table-responsive table" id="search" >
              <table id="paper_table" class="table table-striped"  >
                  <thead  class="table-danger  ">
                      <tr>
                          <th >#</th>
                          <th>Année</th>
                          <th>Titre</th>
                          <th>Auteurs</th>
                          <th>Nom de conférence</th>
                          <th >Classe</th>
                      </tr>
                  </thead>
                  <tbody class="table-light">
                    @foreach($conferences as $conf)
                    <tr>
                      <th> {{$conf->id }} </th>
                      <th> {{$conf->annee }} </th>
                      <th> {{$conf->titre }} </th>
                      <th> {{$conf->auteur }},{{$conf->auteurex }} </th>
                      <th> {{$conf->confname }} </th>
                      <th> {{$conf->class }} </th>
                  </tr> 
                  @endforeach                             
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="container"> 
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  " id="art" style="display: none">
      <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Articles scientifiques</div>
      <div class="card-body ">
          <div class="table-responsive table" id="search" >
              <table id="formation_table" class="table  table-striped" >
                  <thead  class="table-info  ">
                      <tr>
                              <th >#</th>
                              <th>Année</th>
                              <th>Titre</th>
                              <th>Auteurs</th>
                              <th>Titre du journal</th>
                              <th>Quartile </th>
                              <th>Volume</th>
                              <th>Facteur d'impact</th>  
                              <th>Indexation</th> 
                              <th>Site de la revue</th>  
                      </tr>
                  </thead>
                  <tbody class="table-light">
                    @foreach($articles as $art)
                    <tr>
                      <th> {{$art->id}} </th>
                      <th> {{$art->annee}} </th>
                      <th> {{$art->titre}} </th>
                      <th> {{$art->auteur}},{{$art->auteurex}} </th>
                      <th> {{$art->titre_journal}} </th>
                      <th> {{$art->quartile}} </th>
                      <th> {{$art->volume}} </th>
                      <th> {{$art->impact}} </th>
                      <th> {{$art->indexation}} </th>
                      <th> {{$art->site_revue}} </th>
                  </tr> 
                  @endforeach                                   
                  </tbody>
                  
              </table>
          </div>
      </div>
  </div>
  </div>
  <div class="container"> 
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  " id="ouv" style="display: none" >
      <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Ouvrages scientifiques</div>
      <div class="card-body ">
          <div class="table-responsive table" id="search" >
              <table id="ouvnement_table" class="table table-striped" >
                  <thead  class="table-warning  ">
                      <tr>
                              <th >#</th>
                              <th>Année</th>
                              <th>Titre</th>
                              <th>Auteurs</th>
                              <th>Editeur</th>
                              <th>Edition</th>
                              <th>ISBN/Issn</th>
                              <th>Date </th>   
                      </tr>
                  </thead>
                  <tbody class="table-light">
                    @foreach($ouvrages as $ouv)
                    <tr>
                      <th> {{$ouv->id}} </th>
                      <th> {{$ouv->annee}} </th>
                      <th> {{$ouv->titre}} </th>
                      <th> {{$ouv->auteur}},{{$ouv->auteurex}} </th>
                      <th> {{$ouv->editeur}} </th>
                      <th> {{$ouv->edition}} </th>
                      <th> {{$ouv->isbn}} </th>
                      <th> {{$ouv->date}} </th>
                  </tr> 
                  @endforeach                                  
                  </tbody>
                  
              </table>
          </div>
      </div>
  </div>
</div>
</div>
</div> 
</div> 
<div class="container">  
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  " id="brev" style="display: none" >
  <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Brevets</div>
    <div class="card-body ">
      <div class="table-responsive table" id="search" >
          <table id="ouvnement_table" class="table table-striped" >
              <thead  class="table-success  ">
                  <tr>
                    <th >#</th>
                    <th>Année</th>
                    <th>Titre</th>
                    <th>Auteurs</th>
                    <th>Sujet</th>
                    <th>Date</th>
                    
                  </tr>
              </thead>
              <tbody class="table-light">
                @foreach($brevets as $brev)
                <tr>
                  <th> {{$brev->id}} </th>
                  <th> {{$brev->annee}} </th>
                  <th> {{$brev->titre}} </th>
                  <th> {{$brev->auteur}},{{$brev->auteurex}} </th>
                  <th> {{$brev->sujet}} </th>
                  <th> {{$brev->date}} </th>
              </tr> 
              @endforeach                                    
              </tbody>
              
        </table>
      </div>
  </div>
</div>
</div> 
<div class="container"> 
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  " id="chap" style="display: none" >
  <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Chapitres d'ouvrages</div>
  <div class="card-body ">
      <div class="table-responsive table" id="search" >
          <table id="ouvnement_table" class="table table-striped" >
              <thead  class="table-dark  ">
                  <tr>
                          <th >#</th>
                          <th>Titre</th>
                          <th>Année</th>
                          <th>Auteurs</th>
                          <th>Editeur</th>
                          <th>Edition</th>
                          <th>ISBN/Issn</th>
                          <th>Date</th>
                  </tr>
              </thead>
              <tbody class="table-light">
                @foreach($chapitres as $chap)
                <tr>
                  <th> {{$chap->id}} </th>
                  <th> {{$chap->titre}} </th>
                  <th> {{$chap->annee}} </th>
                  <th> {{$chap->auteur}},{{$chap->auteurex}} </th>
                  <th> {{$chap->editeur}} </th>
                  <th> {{$chap->edition}} </th>
                  <th> {{$chap->isbn}} </th>
                  <th> {{$chap->date}} </th>
              </tr> 
              @endforeach                                    
              </tbody>
          </table>
      </div>
  </div>
</div>
</div>
</div>

</div>    
<script>

let conf = document.getElementById("conf");
let art = document.getElementById("art");
let ouv = document.getElementById("ouv");
let brev = document.getElementById("brev");
let chap = document.getElementById("chap");
function showConf(){
if(conf.style.display === 'none'){
conf.style.display='block';
art.style.display='none';
ouv.style.display='none';
brev.style.display='none';
chap.style.display='none';

}
}
function showArt(){
if(art.style.display === 'none'){
art.style.display='block';
conf.style.display='none';
ouv.style.display='none';
brev.style.display='none';
chap.style.display='none';
}
}

function showOuv(){
if(ouv.style.display === 'none'){
ouv.style.display='block';
art.style.display='none';
conf.style.display='none';
brev.style.display='none';
chap.style.display='none';
}
}
function showBrev(){
if(brev.style.display === 'none'){
brev.style.display='block';
art.style.display='none';
conf.style.display='none';
ouv.style.display='none';
chap.style.display='none';
}
}
function showChap(){
if(chap.style.display === 'none'){
chap.style.display='block';
ouv.style.display='none';
conf.style.display='none';
brev.style.display='none';
art.style.display='none';
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
    