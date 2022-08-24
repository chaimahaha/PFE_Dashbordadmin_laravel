@extends('MembreDashboard.Fonctionnalites.productionManager')
@section('title')
  Editer These {{$theses->id}}
@endsection
@section('products')
<div id="these" >
    <form action="/update-these{{$theses->id}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
      <div class="col-sm-10 mt-3 mx-2">
        <h1>Mettre à jour la Thèse</h1>
        <hr>
        <div class="form-group">
          <label class="fw-bold">Titre</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" name="titre" class="form-control mt-2" placeholder="Titre" value={{$theses->titre}}>
        </div><br>

        <div class="form-group">
          <label class="fw-bold">Sujet</label>
          <span class="obligatoryFieldMark">*</span>
          <textarea name="sujet" class="form-control mt-2" cols="20" rows="5">{{$theses->sujet}}</textarea>
        </div><br>

        <div class="form-group">
          <label class="fw-bold">Année de la première inscription</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" class="form-control mt-2" name="anneeinscrip" value={{$theses->anneeinscrip}}>
        </div><br>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Encadrant</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant" value={{$theses->encadrant}}>
            </div>
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail encadrant</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail" value={{$theses->mail_encadrant}}>
            </div>
          </div>
            
        </div><br>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Deuxième encadrant</label>
              <input type="text" name="encadrant_2" class="form-control mt-2 " placeholder="Encadrant" value={{$theses->encadrant_2}}>
            </div>
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Mail encadrant</label>
              <input type="text" name="mail_encadrant_2" class="form-control mt-2 " placeholder="Mail" value={{$theses->mail_encadrant_2}}>
            </div>
          </div>
        </div><br>

        <div class="form-group ">
          <label class="fw-bold mb-2">Cotutelle</label>
          <span class="obligatoryFieldMark">*</span>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="cotutelle"  value="non cotutelle" {{ ($theses->cotutelle)== "non cotutelle" ? 'checked' : '' }}>
            <label class="form-check-label " for="interne" >Non cotutelle</label>                               
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="cotutelle" value="cotutelle" {{ ($theses->cotutelle)== " cotutelle" ? 'checked' : '' }}>
            <label class="form-check-label " for="externe" >Cotutelle</label>
          </div>
        </div><br>

        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
        </div>  
      </div>
  </form>
    
</div>
@endsection

