@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Ajouter Evenement
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
              <a  class="text-muted fw-light" href="eventManager"> Gestion des évenements </a>
              <span class="text-muted fw-light" > /</span> Ajouter Evenement</h4>
        </div><!-- /.col -->
      
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
  <div class="container-fluid">
  <div class="col">
  <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
      <div class="card-body text-dark">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
          <form method="post" action='/store-form' enctype="multipart/form-data">
            {{ csrf_field() }}
            @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
            <div class="col-sm-10 mt-3 mx-1">
                  <h1>Création événement</h1>
                  <hr>
                 
                  <div class="form-group">
                      <label class="fw-bold">Titre</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" class="form-control mt-2" name="titre" placeholder="Titre">
                  </div>
                  <div class="form-group">
                      <label class="fw-bold">Lieu</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" class="form-control mt-2" name="lieu" placeholder="Lieu">
                  </div>
                  <div class="form-group">
                      <label class="fw-bold">Description</label>
                      <span class="obligatoryFieldMark">*</span>
                      <textarea  class="form-control mt-2" name="description" cols="20" rows="5" placeholder="Description"></textarea>
                  </div>
                  <div class="form-group">
                      <label class="fw-bold">Prix(DT)(optionnel)</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" class="form-control mt-2" name="prix" placeholder="Prix">
                  </div>
                  <div class="form-group">
                    <label class="fw-bold">Image(optionnel)</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="file" class="form-control mt-2" name="image">
                </div>
                  <div class="form-group">
                      <label class="fw-bold">Date debut</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="date" class="form-control mt-2 " name="date_start" id="date" >
                  </div><br>
                  <div class="form-group">
                      <label class="fw-bold">Date fin</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="date" class="form-control mt-2 " name="date_end" id="date" >
                  </div><br>
                
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                  </div> 
              </div>
          </form>
      </div>
  </div>
  </div>
</section>




</div>
  @endsection