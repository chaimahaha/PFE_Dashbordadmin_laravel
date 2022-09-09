@extends('AdminDashboard.Fonctionnalites.productionManager')
@section('title')
  Ajouter Habilitation
@endsection
@section('products')

<div id="hab" >
    <form action="/store-hab" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="col-sm-10 mt-3 mx-2">
            <h1>Habilitation</h1>
            <hr>
            <div class="from-group">
              <div class="form-group">
                <label  class="fw-bold">Titre</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="titre" placeholder="Titre ">
              </div><br>
              <div class="form-group">
                <label  class="fw-bold">Nom et prénom titulaire habilitation</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" class="form-control mt-2" name="nom" placeholder="Nom et prénom">
              </div><br>
              <div class="form-group">
                  <label class="fw-bold">Année</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="annee" class="form-control mt-2 " placeholder="Année">
              </div><br>
                                    
              <div class="col-sm-12 form-group">
                <label class="fw-bold">Fichier (PDF, Taille maximale: 1024 ko)</label>
                <input type="file" name="file" class="form-control mt-2" >
              </div><br>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Encadrant</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant">
                  </div>
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Mail encadrant</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail">
                  </div>
                </div>
              </div><br>
                                      
              <div class="form-group">
                <label  class="fw-bold">Date</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="date" class="form-control mt-2" name="date">
              </div><br>
                                      
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
              </div>
          </div>
      </form>   
  </div>
</div>
@endsection