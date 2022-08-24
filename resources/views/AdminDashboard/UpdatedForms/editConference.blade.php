@extends('AdminDashboard.Fonctionnalites.postsManager')
@section('title')
Editer conference {{$conferences->id}}
@endsection
@section('post')
<div>
    <form action="/updateconference{{$conferences->id}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
      <div class="col-sm-10 mt-3 mx-2">
        <h1>Mettre à jour le Conférence</h1>
        <legend><span><i class="bi bi-file-earmark-fill"></i>Informations conférence :</span></legend> 
        <hr>
        <div class="row">
            <div class="col-sm-6 form-group">
              <label class="fw-bold">Année</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="annee" class="form-control mt-2" placeholder="2022" value={{$conferences->annee}}>
            </div>
          <div class="col-sm-6 form-group">
            <label class="fw-bold">Titre</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="titre" placeholder="Titre" class="form-control mt-2 " value={{$conferences->titre}}>
          </div><br>
          <div class="col-sm-12 my-2 form-group ">
            <label class="fw-bold ">Date</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="date" class="form-control mt-2 " name="date" id="datediplome" value={{$conferences->date}} >
          </div>
        </div>
        <div class="col-sm-12 mt-2">
            <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Interne:</span></legend>   
            <hr>
            <div class="from-group">
              <div id="auteur_conference">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Auteur (s)</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="auteur" class="form-control mt-2 " placeholder="Auteur 1, Auteur2.." value={{$conferences->auteur}}>
                  </div>     
                  <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Mail auteur (s)</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="mail" class="form-control mt-2 " placeholder="Mail 1, Mail2.." value={{$conferences->mail}}>
                  </div>    
                </div><br> 
              </div>
              </div>              
              <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Externe : </span></legend>   
              <hr>
              <div class="from-group">
                <div id="conference_externe">
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label class="control-label fw-bold">Auteur externe (s)</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" name="auteurex" class="form-control mt-2 " placeholder="Auteur_externe 1,Auteur_externe 2.." value={{$conferences->auteurex}}>
                    </div>     
                    <div class="col-sm-6 form-group">
                      <label class="control-label fw-bold">Mail externe (s)</label>
                      <span class="obligatoryFieldMark">*</span>
                      <input type="text" name="mailex" class="form-control mt-2 " placeholder="Mail_externe 1,Mail_externe2.." value={{$conferences->mailex}}>
                    </div>    
                  </div><br> 
                </div>
              </div>
              <legend><span> <i class="bi bi-book-fill"></i> Informations conférence : </span> </legend>   
              <hr>
              <div class="form-group"><br>
                <label class="control-label fw-bold">Conference name</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" class="form-control mt-2" name="confname" placeholder="Titre du conférence" value={{$conferences->confname}}>
              </div>
              <div class="form-group"><br>
                <label class="control-label fw-bold">Classe</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="female" value="a" {{ ($conferences->class)== "a" ? 'checked' : '' }} >
                  <label class="form-check-label " for="female" >a</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="b" {{ ($conferences->class)== "b" ? 'checked' : '' }}>
                  <label class="form-check-label " for="male" >b</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="c" {{ ($conferences->class)== "c" ? 'checked' : '' }}>
                  <label class="form-check-label " for="male" >c</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="Internationale" {{ ($conferences->class)== "Internationale" ? 'checked' : '' }} >
                  <label class="form-check-label " for="male" >Internationale</label>
                </div>
              </div><br>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
              </div> 
            </div>
    </div>
  </form>
</div>
  @endsection