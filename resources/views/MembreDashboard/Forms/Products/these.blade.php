@extends('MembreDashboard.Fonctionnalites.productionManager')
@section('title')
  Ajouter These
@endsection
@section('products')
<div id="these" >
  <div class="container">
    <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown">
      <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Théses</div>
        <div class="card-body wow fadeInDown ">
          <div class="table-responsive table" id="search" >
            <table id="paper_table" class="table table-striped" >
              <thead  class="table-success  ">
                <tr>
                    <th >#</th>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Sujet</th>
                    <th>Année d'inscription</th>
                    <th>Encadrants</th>
                    <th>Cotutelle</th>
                                                         
                </tr>
              </thead>
              <tbody class="table-light">
                @foreach($theses as $these)
                <tr>
                      <td> {{$these->id}} </td>
                      <td> {{$these->titre}} </td>
                      <td> {{$these->annee}} </td>
                      <td>{{$these->sujet}}</td>
                      <td> {{$these->anneeinscrip}} </td>
                      <td> {{$these->encadrant}},{{$these->encadrant_2}} </td>
                      <td> {{$these->cotutelle}} </td>
                     
                </tr>
                @endforeach     
              </tbody>
            </table>
            {{ $theses->onEachSide(5)->links() }}
          </div>
        </div>
      </div>  
    </div>
    <div class="mt-2">
      <input type="button" class="btn btn-primary" onclick="showThese()">Ajouter</a>
    </div>
  </div>
    <form action="/store-these" method="post" enctype="multipart/form-data" id="these" style="display: none">
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
        <h1>Thèse</h1>
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

        <div class="form-group">
          <label class="fw-bold">Mémoire de thèse soutenu (fichier PDF qui contient la page de garde, taille maximale 1MO</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="file" name="file" class="form-control mt-2  " >
        </div><br>

        <div class="form-group">
          <label class="fw-bold">Sujet</label>
          <span class="obligatoryFieldMark">*</span>
          <textarea name="sujet" class="form-control mt-2" cols="20" rows="5"></textarea>
        </div><br>

        <div class="form-group">
          <label class="fw-bold">Année de la première inscription</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" class="form-control mt-2" name="anneeinscrip">
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

        <div class="form-group ">
          <label class="fw-bold mb-2">Cotutelle</label>
          <span class="obligatoryFieldMark">*</span>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="cotutelle"  value="non cotutelle">
            <label class="form-check-label " for="interne" >Non cotutelle</label>                               
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="cotutelle" value="cotutelle">
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
<script>
  let these = document.getElementById('these');

function showThese(){
  if(these.style.display === "none"){
    these.style.display="block";

}
}
</script>
