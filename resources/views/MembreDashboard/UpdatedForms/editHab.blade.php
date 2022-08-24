@extends('MembreDashboard.Fonctionnalites.productionManager')
@section('title')
Editer Habilitation {{$habilitations->id}}
@endsection
@section('products')

<div id="hab" >
    <form action="/update-hab{{$habilitations->id}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
      <div class="col-sm-10 mt-3 mx-2">
            <h1>Mettre à jour l'Habilitation</h1>
            <hr>
            <div class="from-group">
              <div class="form-group">
                <label  class="fw-bold">Titre</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="titre" placeholder="Titre " value={{$habilitations->titre}}>
              </div><br>
              <div class="form-group">
                <label  class="fw-bold">Nom et prénom titulaire habilitation</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" class="form-control mt-2" name="nom" placeholder="Nom et prénom" value={{$habilitations->nom}}>
              </div><br>          
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Encadrant</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant" value={{$habilitations->encadrant}}>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Mail encadrant</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail" value={{$habilitations->mail_encadrant}}>
                  </div>
                </div>
              </div><br>
                                      
              <div class="form-group">
                <label  class="fw-bold">Date</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="date" class="form-control mt-2" name="date" value={{$habilitations->date}}>
              </div><br>
                                      
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
              </div>
          </div>
      </form>   
  </div>
</div>
@endsection