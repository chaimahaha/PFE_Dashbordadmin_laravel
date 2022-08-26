@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Gestion des productions
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h4 class="fw-bold py-3 mb-4" >
              <span class="text-muted fw-light">Fonctionnalités </span>
               <span class="text-muted fw-light" > /</span>
              <a  class="text-muted fw-light" href="productionManager"> Gestion des productions </a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="col">
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded" >
          <div class="card-header fw-bold">
            <ul class="nav  card-header-tabs justify-content-center" >
              <li class="nav-item " id="paper">
                <button class="btn btn-outline-success mx-2" ><a class="nav-link " aria-current="true" href="these">Thèse</a></button> 
              </li>
              <li class="nav-item " id="paper">
                <button class="btn btn-outline-success mx-2"  ><a class="nav-link " href="hab" >Habilitation</a></button>
              </li>
              <li class="nav-item " id="paper">
                <button class="btn btn-outline-success mx-2"  ><a class="nav-link " href="pfe">PFE</a></button> 
              </li>
              <li class="nav-item " id="paper">
                <button class="btn btn-outline-success mx-2" ><a class="nav-link " href="master">Master </a></button> 
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<div>
@yield('products')
</div>

</div>
@endsection