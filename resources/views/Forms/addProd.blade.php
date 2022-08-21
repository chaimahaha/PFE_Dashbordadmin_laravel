@extends('layouts.sidebar')
@section('title')
  Ajouter Production
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h4 class="fw-bold py-3 mb-4" >
                <span class="text-muted fw-light">Fonctionnalités </span>
                 <span class="text-muted fw-light" > /</span>
                <a  class="text-muted fw-light" href="productionManager"> Gestion des productions </a>
                <span class="text-muted fw-light" > /</span> Ajouter Production</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="col">
          <div class="card border-dark shadow p-3 mb-5 bg-body rounded" >
            <div class="card-header fw-bold">
              <ul class="nav  card-header-tabs justify-content-center" >
                <li class="nav-item " id="paper">
                  <button class="btn btn-outline-success mx-2" id="show_article" ><a class="nav-link " aria-current="true" href="these">Thèse</a></button> 
                </li>
                <li class="nav-item " id="paper">
                  <button class="btn btn-outline-success mx-2" id="show_ouvrage" ><a class="nav-link " href="hab" >Habilitation</a></button>
                </li>
                <li class="nav-item " id="paper">
                  <button class="btn btn-outline-success mx-2" id="show_chapitre" ><a class="nav-link " href="pfe">PFE</a></button> 
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
<div>
  @yield('products')
</div>

</div>
<script>


  $(document).ready(function () {
      var i = 1 ;
      $("#add_btn").click(function (e) { 
          e.preventDefault();
          i++;
          $("#auteur_article").prepend(`<div class="from-group">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail auteur `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#add_ouvrage_btn").click(function (e) { 
          e.preventDefault();
          i++;
          $("#auteur_ouvrage").prepend(`
          <div class="from-group">
          
          <div class="row">
            <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`"> 
          </div>             
          <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Auteur `+i+`</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
                  </div>         
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#add_chapitre_btn").click(function (e) { 
          e.preventDefault();
          i++;
          $("#auteur_chapitre_ouvrage").prepend(`<div class="from-group">
          
          <div class="row">
            <div class="col-sm-6 form-group">
            <label class="control-label fw-bold">Auteur `+i+`</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
              
          </div>    
          <div class="col-sm-6 form-group">
                    <label class="control-label fw-bold">Auteur `+i+`</label>
                    <span class="obligatoryFieldMark">*</span>
                    <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
                  </div>                   
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#conf_btn").click(function (e) { 
          e.preventDefault();
          i++;
          $("#auteur_conference").prepend(`<div class="from-group">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail auteur `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#add_brevet_btn").click(function (e) { 
          e.preventDefault();
          i++;
          $("#auteur_brevet").prepend(`<div class="from-group">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur[`+i+`]" class="form-control mt-2 " placeholder="Auteur `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail auteur `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail[`+i+`]" class="form-control mt-2 " placeholder="Mail `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  
  $(document).ready(function () {
      var i = 1 ;
      $("#add_externe").click(function (e) { 
          e.preventDefault();
          i++;
          $("#auteur_externe").prepend(`<div class="from-group">
          
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail_externe `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#btn_externe").click(function (e) { 
          e.preventDefault();
          i++;
          $("#externe_ouvrage").prepend(`<div class="from-group">
          
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail_externe `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#btn_chap").click(function (e) { 
          e.preventDefault();
          i++;
          $("#externe_chapitre").prepend(`<div class="from-group">
          
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail_externe `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#conf_externe").click(function (e) { 
          e.preventDefault();
          i++;
          $("#conference_externe").prepend(`<div class="from-group">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail_externe `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  $(document).ready(function () {
      var i = 1 ;
      $("#btn_externe_brevet").click(function (e) { 
          e.preventDefault();
          i++;
          $("#externe_brevet").prepend(`<div class="from-group">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label class="control-label fw-bold">Auteur_externe `+i+`</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="text" name="auteur_externe[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
            </div>
            <div class="col-sm-6 form-group">
                <label class="control-label fw-bold">Mail_externe `+i+`</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" name="mail_externe[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
            </div>    
                               
        </div><br> 
        <div class="col-sm-6 form-group">
          <button type="button" class="btn btn-danger mb-2" id="remove">Supprimer</button>
        </div>
      </div>`);
          
      });
  });
  
  
  $(document).on('click','#remove', function (e) {
      e.preventDefault();
      let row_item = $(this).parent().parent()
      $(row_item).remove();
     
      
  });
  
  
  
  $(document).on('click','#remove', function (e) {
      e.preventDefault();
      let row_item = $(this).parent().parent()
      $(row_item).remove();
     
      
  });
  
  </script>
  

@endsection