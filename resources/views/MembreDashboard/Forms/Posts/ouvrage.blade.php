@extends('MembreDashboard.Fonctionnalites.postsManager')
@section('title')
  Ajouter ouvrage
@endsection
@section('post')
<div id="ouvrage_scientifique">
  <form action="/store-ouv" method="post" >
    {{ csrf_field() }}
      <div class="col-sm-10 mt-3 mx-2">
        <h1>Création ouvrage</h1>
        <hr>
        <div class="form-group">
          <label class="fw-bold">Année</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" name="annee" class="form-control mt-2" placeholder="2022">
        </div><br>
        <legend><span><i class="bi bi-person-fill"></i>Auteur(s) Interne :</span></legend>   
        <hr>            
        <div class="from-group">
          <div id="auteur_ouvrage">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Auteur (s)</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="auteur" class="form-control mt-2 " placeholder="Auteur 1,Auteur 2..">
              </div>  
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail auteur (s)</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail" class="form-control mt-2 " placeholder="Mail 1,Mail 2..">
              </div>  
            </div><br>                           
          </div>
          <legend><span><i class="bi bi-person-fill"></i>Auteur(s) Externe :</span></legend>   
          <hr>
          <div class="from-group">
            <div id="externe_ouvrage">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Auteur externe (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="auteurex" class="form-control mt-2 " placeholder="Auteur_externe 1,Auteur_externe 2..">
                </div>     
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Mail externe (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mailex" class="form-control mt-2 " placeholder="Mail_externe 1,Mail_externe 2..">
                </div>    
              </div><br>
            </div>
          </div>
          <div class="form-group">
            <label  class="fw-bold">Titre</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="titre" placeholder="Titre ">
          </div><br>
          <div class="form-group">
            <label  class="fw-bold">Éditeur</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="editeur" placeholder="Éditeur ">
          </div><br>
          <div class="form-group">
            <label  class="fw-bold">Lien éditeur</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="lien" placeholder="Lien éditeur ">
          </div><br>
          <div class="form-group">
            <label  class="fw-bold">Édition</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="edition" placeholder="Édition ">
          </div><br>
          <div class="form-group">
            <label  class="fw-bold">ISBN/Issn</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="isbn" placeholder="ISBN/Issn">
          </div><br>
          <div class="form-group">
            <label  class="fw-bold">Date</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="date" class="form-control mt-2" name="date">
          </div><br>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
          </div>
        </div>
      </div>                
  </form>           
</div>
@endsection