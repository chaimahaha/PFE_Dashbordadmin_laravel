@extends('AdminDashboard.Fonctionnalites.productionManager')
@section('title')
Editer Master {{$masters->id}}
@endsection
@section('products')
<div id="Master">
    <form action="/update-master{{$masters->id}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
    <div class="col-sm-10 mt-3 mx-2">   
          <h1>Mettre à jour le Master</h1>
          <hr>
          <div class="form-group">
            <label class="fw-bold">Titre</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="titre" class="form-control mt-2" placeholder="Titre" value={{$masters->titre}}>
          </div><br>
          <div class="form-group">
            <label class="fw-bold">Année</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="annee" placeholder="Année" value={{$masters->annee}}>
        </div><br>
          <div class="form-group">
            <label class="fw-bold">Description</label>
            <textarea name="description" class="form-control mt-2" cols="20" rows="5">{{$masters->description}}</textarea>
          </div><br>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Encadrant</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="encadrant" class="form-control mt-2 " placeholder="Encadrant" value={{$masters->encadrant}}>
              </div>
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail encadrant</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail_encadrant" class="form-control mt-2 " placeholder="Mail" value={{$masters->mail_encadrant}}>
              </div>
            </div>
          
          </div><br>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Deuxième encadrant</label>
                <input type="text" name="encadrant_2" class="form-control mt-2 " placeholder="Encadrant" value={{$masters->encadrant_2}}>
              </div>
              <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail encadrant</label>
                <input type="text" name="mail_encadrant_2" class="form-control mt-2 " placeholder="Mail" value={{$masters->mail_encadrant_2}}>
              </div>
            </div>
          </div><br>
    
          
          <div class="form-group">
            <label class="fw-bold">Institution</label>
            <input type="text" name="institut" class="form-control mt-2" placeholder="Institution" value={{$masters->institut}}>
          </div><br>
          <div class="form-group">
            <label class="fw-bold">Etudiant</label>
            <input type="text" name="etudiant" class="form-control mt-2" placeholder="Etudiant" value={{$masters->etudiant}}>
          </div><br>
          <div class="form-group">
          <label class="fw-bold">Date debut de Master</label>
          <input type="date" name="date_start" id="debut" class="form-control mt-2" value={{$masters->date_start}}>
          </div><br>
          <div class="form-group">
          <label class="fw-bold">Date fin de Master</label>
          <input type="date" name="date_end" id="debut" class="form-control mt-2" value={{$masters->date_end}}>
          </div><br>
          <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
            </div>
      </div>
    </form>
    </div>
    @endsection
    