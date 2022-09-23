@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Gestion des publications
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="col-sm-8">
          <h4 class="fw-bold py-3 mb-4" >
              <span >Fonctionnalités </span>
              <span class="text-muted fw-light" > /</span>
              <a  style="color:#92b1f5" href="postsManager"> Gestion des publications </a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
</div>
<section class="content">
<div class="container-fluid">
  <div class="col">
    <div class="card border-dark shadow p-3 mb-5 bg-body rounded" >
      <div class="card-header fw-bold">
        <ul class="nav  card-header-tabs justify-content-center" >
          <li class="nav-item " id="paper">
            <button class="btn  btn-outline-info mx-2 my-2" id="show_article" ><a class="nav-link " aria-current="true" href="article" style="color: rgb(11, 34, 5)">Article scientifique</a></button> 
          </li>
          <li class="nav-item " id="paper">
            <button class="btn  btn-outline-warning mx-2 my-2" id="show_ouvrage" ><a class="nav-link "href="ouvrage" style="color: rgb(11, 34, 5)">Ouvrage scientifique</a></button>
          </li>
          <li class="nav-item " id="paper">
            <button class="btn  btn-outline-dark mx-2 my-2" id="show_chapitre" ><a class="nav-link "href="chapitre" style="color: rgb(11, 34, 5)">Chapitre d'ouvrage</a></button> 
          </li>
          <li class="nav-item " id="paper">
            <button class="btn  btn-outline-success mx-2 my-2" id="show_these" ><a class="nav-link " href="brevet" style="color: rgb(11, 34, 5)">Brevet</a></button> 
          </li>
          <li class="nav-item " id="paper">
            <button class="btn  btn-outline-danger mx-2 my-2" id="show_these"><a class="nav-link " href="conference" style="color: rgb(11, 34, 5)">Conférence</a></button> 
          </li>
        </ul>
      </div>
    <div> 
  </div>
</div>
<div>
  @yield('post')
</div>
</section>
@endsection