@extends('MembreDashboard.Fonctionnalites.postsManager')
@section('title')
Editer chapitre {{$chapitres->id}}
@endsection
@section('post')
<div id="chapitre_ouvrage">  
  <form action="/update-chap{{$chapitres->id}}" method="post">  
    {{ csrf_field() }}
    @method('PUT')
    <div class="col-sm-10 mt-3 mx-2">
        <h1>Mettre à jour le chapitre d'ouvrage</h1>
        <hr>
        <div class="form-group">
          <label class="fw-bold">Année</label><span class="obligatoryFieldMark">*</span>
          <input type="text" name="annee" class="form-control mt-2" placeholder="2022" value={{$chapitres->annee}}>
        </div><br>
        <legend> <span><i class="bi bi-person-fill"></i>Auteur(s) Interne :</span></legend>   
        <hr>
        <div class="from-group">
          <div id="auteur_chapitre_ouvrage">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Auteur (s)</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="auteur" class="form-control mt-2 " placeholder="Auteur 1,Auteur 2.." value={{$chapitres->auteur}}>
              </div> 
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail (s)</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail" class="form-control mt-2 " placeholder="mail 1,mail2.." value={{$chapitres->mail}}>
              </div>                    
            </div><br> 
          </div>
          <br>
          <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Externe :</span></legend>   
          <hr>
          <div class="from-group">
            <div id="externe_chapitre">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Auteur externe (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="auteurex" class="form-control mt-2 " placeholder="Auteur_externe 1" value={{$chapitres->auteurex}}>
                </div>     
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Mail externe (s)</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mailex" class="form-control mt-2 " placeholder="Mail_externe 1" value={{$chapitres->mailex}}>
                </div>    
              </div><br> 
            </div>
          </div>
        <br>
      <div class="form-group">
        <label  class="fw-bold">Titre</label>
        <span class="obligatoryFieldMark">*</span>
        <input type="text" class="form-control mt-2" name="titre" placeholder="Titre " value={{$chapitres->titre}}>
      </div><br>           
      <div class="form-group">
        <label  class="fw-bold">Éditeur</label>
        <span class="obligatoryFieldMark">*</span>
        <input type="text" class="form-control mt-2" name="editeur" placeholder="Éditeur " value={{$chapitres->editeur}}>
      </div><br>         
      <div class="form-group">
        <label  class="fw-bold">Lien éditeur</label>
        <span class="obligatoryFieldMark">*</span>
        <input type="text" class="form-control mt-2" name="lien" placeholder="Lien éditeur " value={{$chapitres->lien}}>
      </div><br>        
      <div class="form-group">
        <label  class="fw-bold">Édition</label>
        <span class="obligatoryFieldMark">*</span>
        <input type="text" class="form-control mt-2" name="edition" placeholder="Édition " value={{$chapitres->edition}}>
      </div><br>         
      <div class="form-group">
        <label  class="fw-bold">ISBN/Issn</label>
        <span class="obligatoryFieldMark">*</span>
        <input type="text" class="form-control mt-2" name="isbn" placeholder="ISBN/Issn" value={{$chapitres->isbn}}>
      </div><br>      
      <div class="form-group">
        <label  class="fw-bold">Date</label>
        <span class="obligatoryFieldMark">*</span>
        <input type="date" class="form-control mt-2" name="date" value={{$chapitres->date}}>
      </div><br>
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>  
      </div>
    </div>    
  </form>           
</div>
                  
</div>
@endsection