@extends('AdminDashboard.layouts.sidebar')
@section('title')
Editer conférence {{$manifestations->id}}
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
          <span class="text-muted fw-light" > /</span> Editer conférence</h4>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="col">
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
          <div class="card-body text-dark">
            <form action='/update-conf{{$manifestations->id}}' method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method('PUT')
              <div class="col-sm-10 mt-3 mx-1">
                <h1>Mettre à jour d'une conférence</h1>
                <hr> 
                <div class="form-group">
                  <label class="fw-bold">Titre</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="titre" placeholder="Titre" value="{{$manifestations->titre}}">
                </div>
                <div class="form-group">
                    <label class="fw-bold">Lieu</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" class="form-control mt-2" name="lieu" placeholder="Lieu" value="{{$manifestations->lieu}}">
              </div>
              <div class="form-group">
                  <label class="fw-bold">Prix de participation</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="prix" placeholder="Prix" value="{{$manifestations->prix}}">
              </div>
              <div class="form-group">
                  <label class="fw-bold">Date debut</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="date" class="form-control mt-2 " name="date_start" id="date" value="{{$manifestations->date_start}}" >
              </div><br>
              <div class="form-group">
                  <label class="fw-bold">Date fin</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="date" class="form-control mt-2 " name="date_end" id="date" value="{{$manifestations->date_end}}">
              </div><br>
              <div class="form-group">
                <label class="control-label fw-bold">Classe</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="class" id="female" value="a" {{ ($manifestations->class)== "a" ? 'checked' : '' }} >
                    <label class="form-check-label " for="female" >a</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="b"  {{ ($manifestations->class)== "b" ? 'checked' : '' }}>
                  <label class="form-check-label " for="male" >b</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="c" {{ ($manifestations->class)== "c" ? 'checked' : '' }} >
                  <label class="form-check-label " for="male" >c</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="internationale" {{ ($manifestations->class)== "internationale" ? 'checked' : '' }}>
                  <label class="form-check-label " for="male" >Internationale</label>
                </div>
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