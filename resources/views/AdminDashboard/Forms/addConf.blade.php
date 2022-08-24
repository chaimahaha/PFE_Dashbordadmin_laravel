@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Ajouter conférence
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
          <a  class="text-muted fw-light" href="manifestationManager"> Gestion des manifestations </a>
          <span class="text-muted fw-light" > /</span> Ajouter conférence</h4>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="col">
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
          <div class="card-body text-dark">
            <form action='addconf' method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="col-sm-10 mt-3 mx-1">
                <h1>Création conférence</h1>
                <hr> 
                <div class="form-group">
                  <label class="fw-bold">Titre</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2 @error('titre') is-invalid @enderror" name="titre" placeholder="Titre">
                  @error('titre')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <label class="fw-bold">Lieu</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" class="form-control mt-2 @error('lieu') is-invalid @enderror" name="lieu" placeholder="Lieu">
                    @error('lieu')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label class="fw-bold">Prix de participation</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2 @error('prix') is-invalid @enderror" name="prix" placeholder="Prix">
                  @error('prix')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
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
              <div class="form-group">
                <label class="control-label fw-bold @error('class') is-invalid @enderror">Classe</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="class" id="female" value="a"  >
                    <label class="form-check-label " for="female" >a</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="b" >
                  <label class="form-check-label " for="male" >b</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="c" >
                  <label class="form-check-label " for="male" >c</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="internationale" >
                  <label class="form-check-label " for="male" >Internationale</label>
                </div>
                @error('class')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div><br>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>  
@endsection