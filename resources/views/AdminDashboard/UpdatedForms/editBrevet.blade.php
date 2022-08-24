@extends('AdminDashboard.Fonctionnalites.postsManager')
@section('title')
Editer brevet {{$brevets->id}}
@endsection
@section('post')
<div id="brevet"  >
    <form action="/update-brev{{$brevets->id}}" method="post" enctype="multipart/form-data" >  
      {{ csrf_field() }}
      @method('PUT')
    <div class="col-sm-10 mt-3 mx-2">
        <h1>Mettre à jour le brevet</h1>
        <hr>
        <div class="form-group">
          <label class="fw-bold">Titre</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" name="titre" class="form-control mt-2" placeholder="Titre" value={{$brevets->titre}}>
        </div><br>
        <div class="form-group">
          <label class="fw-bold">Année</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" name="annee" class="form-control mt-2" placeholder="2022" value="{{$brevets->annee}}">
      </div><br>
        <legend>
                <span>
                  <i class="bi bi-person-fill"></i>
                  Auteur(s) Interne :
                </span>
              </legend>   
          <hr>
          <div class="from-group">
            <div id="auteur_brevet">
              <div class="row">
                <div class="col-sm-6 form-group">
                 <label class="control-label fw-bold">Auteur (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="auteur" class="form-control mt-2 " placeholder="Auteur 1,Auteur 2.." value={{$brevets->auteur}}>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Mail auteur (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mail" class="form-control mt-2 " placeholder="Mail 1,Mail 2.." value={{$brevets->mail}}>
                </div>
              </div>
            </div>
          </div><br>
          <br>
          <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Externe : </span> </legend>   
          <hr>
          <div class="form-group">
            <div id="externe_brevet">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Auteur externe (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="auteurex" class="form-control mt-2 " placeholder="Auteur_externe 1,Auteur_externe 2.." value={{$brevets->auteurex}}>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Mail externe (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mailex" class="form-control mt-2 " placeholder="Mail_externe 1,Mail_externe 2.." value={{$brevets->mailex}}>
                </div>
              </div>
            </div>
          </div>
          <br>
        <div class="form-group">
          <label class="fw-bold">Sujet</label>
          <textarea name="sujet" class="form-control mt-2" cols="20" rows="5">{{$brevets->sujet}}</textarea>
        </div><br>
        <div class="form-group">
          <label class="fw-bold">Date</label>
          <input name="date" class="form-control mt-2" type="date" value= {{$brevets->date}} />
        </div><br>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
        </div>
    </form>           
</div>
@endsection