@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Editer actualité {{$actualities->id}}
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
                <a  class="text-muted fw-light" href="actualityManager"> Gestion des actualités </a>
                <span class="text-muted fw-light" > /</span> Editer Actualité</h4>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
        <div class="col">
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
            <div class="card-body text-dark">
                <form action='/update-act{{$actualities->id}}' method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  @method('PUT')
                    <div class="col-sm-10 mt-3 mx-1">
                        <h1>Mettre à jour d'une actualité</h1>
                        <hr>
                        <div class="form-group">
                            <label class="fw-bold">Titre</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="titre" placeholder="Titre" value={{$actualities->titre}}>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Description</label>
                            <span class="obligatoryFieldMark">*</span>
                            <textarea  class="form-control mt-2" name="description" cols="20" rows="5" placeholder="Description" >{{$actualities->description}}</textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-outline-success m-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

</div>
@endsection