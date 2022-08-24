@extends('MembreDashboard.Fonctionnalites.productionManager')
@section('title')
  Ajouter PFE
@endsection
@section('products')
<div id="pfe">
    <form action="/store-pfe" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="col-sm-10 mt-3 mx-2">   
          <h1>PFE</h1>
          <hr>
          <div class="form-group">
            <label class="fw-bold">Titre</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="titre" class="form-control mt-2" placeholder="Titre">
          </div><br>
    
          <div class="col-sm-6 form-group">
            <label class="fw-bold">Fichier (PDF)</label>
            <input type="file" name="file" class="form-control mt-4" >
          </div><br>
          
          <div class="form-group">
            <label class="fw-bold">Description</label>
            <textarea name="description" class="form-control mt-2" cols="20" rows="5"></textarea>
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
            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Deuxième encadrant</label>
                <input type="text" name="encadrant_2" class="form-control mt-2 " placeholder="Encadrant">
              </div>
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail encadrant</label>
                <input type="text" name="mail_encadrant_2" class="form-control mt-2 " placeholder="Mail">
              </div>
            </div>
          </div><br>
    
          
          <div class="form-group">
            <label class="fw-bold">Institution</label>
            <input type="text" name="institut" class="form-control mt-2" placeholder="Institution">
          </div><br>
          <div class="form-group">
            <label class="fw-bold">Etudiant</label>
            <input type="text" name="etudiant" class="form-control mt-2" placeholder="Etudiant">
          </div><br>
          <div class="form-group">
          <label class="fw-bold">Date debut de PFE</label>
          <input type="date" name="date_start" id="debut" class="form-control mt-2">
          </div><br>
          <div class="form-group">
          <label class="fw-bold">Date fin de PFE</label>
          <input type="date" name="date_end" id="debut" class="form-control mt-2">
          </div><br>
          <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
            </div>
      </div>
    </form>
    </div>
    @endsection
    