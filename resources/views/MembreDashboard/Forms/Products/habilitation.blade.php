@extends('MembreDashboard.Fonctionnalites.productionManager')
@section('title')
  Ajouter Habilitation
@endsection
@section('products')

<div id="hab" >
  <div class="container">
    <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown">
      <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Habilitations</div>
        <div class="card-body wow fadeInDown ">
          <div class="table-responsive table" id="search" >
            <table id="paper_table" class="table table-striped" >
              <thead  class="table-danger  ">
                <tr>
                    <th >#</th>
                    <th>Titre</th>
                    <th>Nom & Prenom</th>
                    <th>Année</th>
                    <th>Encadrants</th>
                    <th >Date</th>   
                                                    
                </tr>
              </thead>
              <tbody class="table-light">
                @foreach($habilitations as $hab)
                <tr>
                      <td> {{$hab->id}} </td>
                      <td> {{$hab->titre}} </td>
                      <td> {{$hab->nom}} </td>
                      <td> {{$hab->annee}} </td>
                      <td> {{$hab->encadrant}} </td>
                      <td> {{$hab->date}} </td>
                     
                </tr>
                @endforeach     
              </tbody>
            </table>
            {{$habilitations->onEachSide(5)->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
    <form action="/store-hab" method="post" enctype="multipart/form-data">
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
            <h1>Habilitation</h1>
            <hr>
            <div class="from-group">
              <div class="form-group">
                <label  class="fw-bold">Titre</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="titre" placeholder="Titre ">
              </div><br>
              <div class="form-group">
                <label  class="fw-bold">Nom et prénom titulaire habilitation</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" class="form-control mt-2" name="nom" placeholder="Nom et prénom">
              </div><br>
              <div class="form-group">
                  <label class="fw-bold">Année</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" class="form-control mt-2" name="annee" placeholder="Année">
              </div><br>
                                    
              <div class="form-group">
                <label class="fw-bold">Fichier (PDF, Taille maximale: 1024 ko)</label>
                <input type="file" name="file" class="form-control mt-4" >
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
                <label  class="fw-bold">Date</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="date" class="form-control mt-2" name="date">
              </div><br>
                                      
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
              </div>
          </div>
      </form>   
  </div>
</div>
@endsection