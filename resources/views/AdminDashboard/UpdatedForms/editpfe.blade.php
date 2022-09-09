@extends('AdminDashboard.Fonctionnalites.productionManager')
@section('title')
Editer PFE {{$pfes->id}}
@endsection
@section('products')
<div id="pfe">
    <form action="/update-pfe{{$pfes->id}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
    <div class="col-sm-10 mt-3 mx-2">   
          <h1>Mettre à jour le PFE</h1>
          <hr>
          <div class="form-group">
            <label class="fw-bold">Titre</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="titre" class="form-control mt-2" placeholder="Titre" value={{$pfes->titre}}>
          </div><br>
          <div class="form-group">
            <label class="fw-bold">Année</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="annee" placeholder="Année" value={{$pfes->annee}}>
        </div><br>
          <div class="form-group">
            <label class="fw-bold">Description</label>
            <textarea name="description" class="form-control mt-2" cols="20" rows="5">{{$pfes->description}}</textarea>
          </div><br>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Encadrant</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant" value={{$pfes->encadrant}}>
              </div>
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail encadrant</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail" value={{$pfes->mail_encadrant}}>
              </div>
            </div>
          
          </div><br>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Deuxième encadrant</label>
                <input type="text" name="encadrant_2" class="form-control mt-2 " placeholder="Encadrant" value={{$pfes->encadrant_2}}>
              </div>
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail encadrant</label>
                <input type="text" name="mail_encadrant_2" class="form-control mt-2 " placeholder="Mail" value={{$pfes->mail_encadrant_2}}>
              </div>
            </div>
          </div><br>
    
          
          <div class="form-group">
            <label class="fw-bold">Institution</label>
            <input type="text" name="institut" class="form-control mt-2" placeholder="Institution" value={{$pfes->institut}}>
          </div><br>
          <div class="form-group">
            <label class="fw-bold">Etudiant</label>
            <input type="text" name="etudiant" class="form-control mt-2" placeholder="Etudiant" value={{$pfes->etudiant}}>
          </div><br>
          <div class="form-group">
          <label class="fw-bold">Date debut de PFE</label>
          <input type="date" name="date_start" id="debut" class="form-control mt-2" value={{$pfes->date_start}}>
          </div><br>
          <div class="form-group">
          <label class="fw-bold">Date fin de PFE</label>
          <input type="date" name="date_end" id="debut" class="form-control mt-2" value={{$pfes->date_end}}>
          </div><br>
          <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
            </div>
      </div>
    </form>
    </div>
    @endsection
    