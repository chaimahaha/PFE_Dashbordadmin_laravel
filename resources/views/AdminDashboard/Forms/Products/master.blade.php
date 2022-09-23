@extends('AdminDashboard.Fonctionnalites.productionManager')
@section('title')
  Ajouter Master
@endsection
@section('products')
<div id="pfe">
  <div class="container">
    <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown" >
      <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Masters</div>
        <div class="card-body wow fadeInDown ">
          <div class="table-responsive table" id="search" >
            <table id="paper_table" class="table table-striped" >
              <thead  class="table-info  ">
                <tr>
                    <th >#</th>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Sujet</th>
                    <th>Nom & Prenom</th>
                    <th>Encadrants</th>
                    <th>Institution</th>                                       
                </tr>
              </thead>
              <tbody class="table-light">
                @foreach($masters as $master)
                <tr>
                      <td> {{$master->id}} </td>
                      <td> {{$master->titre}} </td>
                      <td> {{$master->annee}} </td>
                      <td>{{$master->description}}</td>
                      <td> {{$master->etudiant}} </td>
                      <td> {{$master->encadrant}},{{$master->encadrant_2}} </td>
                      <td> {{$master->institut}} </td>
                </tr>
                @endforeach     
              </tbody>
            </table>
            {{$masters->onEachSide(5)->links()}}
          </div>
        </div>
      </div>
    </div>
  <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown">
    <form action="/store-master" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
      <div class="col-sm-10 mt-3 mx-2">   
          <h1>Master</h1>
          <hr>
          <div class="form-group">
            <label class="fw-bold">Titre</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="titre" class="form-control mt-2" placeholder="Titre">
          </div><br>
          <div class="form-group">
            <label class="fw-bold">Année</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" class="form-control mt-2" name="annee" placeholder="Année">
        </div><br>
          <div class="col-sm-12 form-group">
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
</div>
    </div>
    @endsection
    