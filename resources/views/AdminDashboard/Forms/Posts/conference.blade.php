@extends('AdminDashboard.Fonctionnalites.postsManager')
@section('title')
  Ajouter conférence
@endsection
@section('post')
<div id="conference" >
  <div class="container">             
    <div class="card mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown">
        <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Conférence</div>
        <div class="card-body wow fadeInDown ">
            <div class="table-responsive table" id="search" >
                <table id="paper_table" class="table table-striped"  >
                    <thead  class="table-danger  ">
                        <tr>
                            <th >#</th>
                            <th>Année</th>
                            <th>Titre</th>
                            <th>Auteurs</th>
                            <th>Nom de conférence</th>
                            <th >Classe</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                      @foreach($conferences as $conf)
                      <tr>
                        <th> {{$conf->id }} </th>
                        <th> {{$conf->annee }} </th>
                        <th> {{$conf->titre }} </th>
                        <th> {{$conf->auteur }},{{$conf->auteurex }} </th>
                        <th> {{$conf->confname }} </th>
                        <th> {{$conf->class }} </th>
                    </tr> 
                    @endforeach                             
                    </tbody>
                </table>
                {{$conferences->links()}}
            </div>
        </div>
  </div>
    <div class="card mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown">
      <form action="/store-conf" method="post" enctype="multipart/form-data">
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
        <h1>Création Conférence</h1>
        <legend><span><i class="bi bi-file-earmark-fill"></i>Informations conférence :</span></legend> 
        <div class="row">
          <div class="col-sm-6 form-group">
            <label class="fw-bold">Année</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="annee" class="form-control mt-2" placeholder="2022">
          </div>
          <div class="col-sm-6 form-group">
            <label class="fw-bold">Titre</label>
            <span class="obligatoryFieldMark">*</span>
            <input type="text" name="titre" placeholder="Titre" class="form-control mt-2 " >
          </div>
        </div><br>
        <div class="col-sm-12 mt-2">
          <div class="row ">
            <div class="col-sm-6 form-group ">
              <label class="fw-bold ">Date</label>
              <span class="obligatoryFieldMark">*</span>
              <input type="date" class="form-control mt-2 " name="date" id="datediplome" >
            </div>
            <div class="col-sm-6 form-group">
              <label class="fw-bold ">Fichier (PDF, Taille maximale: 1024 ko)</label>
              <input type="file" name="file" class="form-control mt-2" >
            </div><br>
            </div><br>
            <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Interne:</span></legend>   
            <div class="from-group">
              <div id="auteur_conference">
                <div class="row">
                  <div class="col-sm-6 form-group">
                      <label class="control-label fw-bold">Auteur 1</label>
                      <span class="obligatoryFieldMark">*</span><textarea type="text" name="auteur" class="form-control mt-2 " placeholder="Auteur "></textarea>
                  </div>     
                  <div class="col-sm-6 form-group">
                      <label class="control-label fw-bold">Mail auteur 1</label>
                      <span class="obligatoryFieldMark">*</span><textarea type="text" name="mail" class="form-control mt-2 " placeholder="Mail "></textarea>
                  </div>
                  {{--
                  <div class="col-sm-2 form-group">
                      <label class="control-label fw-bold">Ordre</label> <br>
                      <select name="ordre" id="ordre" class="form-select mt-2">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                      </select>
                  </div>
                  <div class="col-sm mt-4">
                      <a role="button" class="btn btn-outline-primary mt-2" id="add_btn">+</a>
                  </div>
                  --}}
              </div><br>  
              </div>
              </div>              
              <br>
              <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Externe : </span></legend>   
              <div class="from-group">
                <div id="conference_externe">
                  <div class="row">
                    <div class="col-sm-6 form-group">
                        <label class="control-label fw-bold">Auteur externe 1</label>
                        <span class="obligatoryFieldMark">*</span>
                        <textarea type="text" name="auteurex" class="form-control mt-2 " placeholder="Auteur_externe 1"></textarea>
                    </div>     
                    <div class="col-sm-6 form-group">
                        <label class="control-label fw-bold">Mail externe 1</label>
                        <span class="obligatoryFieldMark">*</span>
                        <textarea type="text" name="mailex" class="form-control mt-2 " placeholder="Mail_externe 1"></textarea>
                    </div>
                    {{--
                    <div class="col-sm-2 form-group">
                        <label class="control-label fw-bold">Ordre</label> <br>
                        <select name="ordre" id="ordre" class="form-select mt-2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col-sm mt-4">
                        <a role="button" class="btn btn-outline-primary mt-2" id="add_externe">+</a>
                    </div> 
                    --}}   
                </div><br> 
                </div>
              </div>
              <br>
              <legend><span> <i class="bi bi-book-fill"></i> Informations conférence : </span> </legend>   
              <div class="form-group"><br>
                <label class="control-label fw-bold">Conference name</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="text" class="form-control mt-2" name="confname" placeholder="Titre du conférence">
              </div>
              <div class="form-group"><br>
                <label class="control-label fw-bold">Classe</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="female" value="a"  >
                  <label class="form-check-label " for="female" >a</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="b" >
                  <label class="form-check-label " for="male" >b</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="c" >
                  <label class="form-check-label " for="male" >c</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="class" id="male" value="Internationale" >
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
</div>
</div>
<script>
  $(document).ready(function () {
  var i = 1 ;
  $("#add_btn").click(function (e) { 
      e.preventDefault();
      if(i<10){
      i++;
      $("#auteur_conference").append(`<div class="from-group">
                                  <div class="row">
                              <div class="col-sm-4 form-group">
                                  <label class="control-label fw-bold">Auteur  `+i+`</label>
                                  <span class="obligatoryFieldMark">*</span><input type="text" name="auteur[ `+i+`]" class="form-control mt-2 " placeholder="Auteur  `+i+`">
                              </div>     
                              <div class="col-sm-4 form-group">
                                  <label class="control-label fw-bold">Mail auteur `+i+`</label>
                                  <span class="obligatoryFieldMark">*</span><input type="text" name="mail[ `+i+`]" class="form-control mt-2 " placeholder="Mail  `+i+` ">
                              </div>
                              <div class="col-sm-2 form-group">
                                  <label class="control-label fw-bold">Ordre</label> <br>
                                  <select name="ordre" id="ordre" class="form-select mt-2">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                  </select>
                              </div>
                              <div class="col-sm mt-4">
                                  <a role="button" class="btn btn-outline-danger mt-2" id="remove">-</a>
                              </div>
                          </div>
                          </div><br>`);}
                          else{
                              $("#auteur_conference").append(`<span style="color:red;"> Vous avez dépacer la limite de nombre d'auteurs </span><br>`); 
                          }
                      
      
  });
  });
  $(document).ready(function () {
  var i = 1 ;
  $("#add_externe").click(function (e) { 
      e.preventDefault();
      if(i<10){
      i++;
      $("#conference_externe").append(`<div class="from-group">
                      <div id="conference_externe">
                          <div class="row">
                              <div class="col-sm-4 form-group">
                                  <label class="control-label fw-bold">Auteur externe `+i+`</label>
                                  <span class="obligatoryFieldMark">*</span>
                                  <input type="text" name="auteurex[`+i+`]" class="form-control mt-2 " placeholder="Auteur_externe `+i+`">
                              </div>     
                              <div class="col-sm-4 form-group">
                                  <label class="control-label fw-bold">Mail externe `+i+`</label>
                                  <span class="obligatoryFieldMark">*</span>
                                  <input type="text" name="mailex[`+i+`]" class="form-control mt-2 " placeholder="Mail_externe `+i+`">
                              </div>
                              <div class="col-sm-2 form-group">
                                  <label class="control-label fw-bold">Ordre</label> <br>
                                  <select name="ordre" id="ordre" class="form-select mt-2">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                  </select>
                              </div>
                              <div class="col-sm mt-4">
                                  <a role="button" class="btn btn-outline-danger mt-2" id="remove">-</a>
                              </div>    
                          </div><br>        
                      </div>
                  </div>`);}
                  else {
                      $("#conference_externe").append(`<span style="color:red;"> Vous avez dépacer la limite de nombre d'auteurs externes </span><br>`);
                  }
      
  });
  });
  $(document).on('click','#remove', function (e) {
  e.preventDefault();
  let row_item = $(this).parent().parent()
  $(row_item).remove();
 
  
  });
</script>
  @endsection