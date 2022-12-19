@extends('MembreDashboard.Fonctionnalites.postsManager')
@section('title')
  Ajouter article
@endsection
@section('post')
<div id="article_scientifique" >
    <div class="container"> 
        <div class="card  mt-5 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center fw-bold fs-4" style="color:#22577E">Articles scientifiques</div>
            <div class="card-body ">
                <div class="table-responsive table" id="search" >
                    <table id="formation_table" class="table  table-striped" >
                        <thead  class="table-info  ">
                            <tr>
                                    <th >#</th>
                                    <th>Année</th>
                                    <th>Titre</th>
                                    <th>Auteurs</th>
                                    <th>Titre du journal</th>
                                    <th>Quartile </th>
                                    <th>Volume</th>
                                    <th>Facteur d'impact</th>  
                                    <th>Indexation</th> 
                                    <th>Site de la revue</th> 
                                   
                            </tr>
                        </thead>
                        <tbody class="table-light">
                          @foreach($articles as $art)
                          <tr>
                            <th> {{$art->id}} </th>
                            <th> {{$art->annee}} </th>
                            <th> {{$art->titre}} </th>
                            <th> {{$art->auteur}},{{$art->auteurex}} </th>
                            <th> {{$art->titre_journal}} </th>
                            <th> {{$art->quartile}} </th>
                            <th> {{$art->volume}} </th>
                            <th> {{$art->impact}} </th>
                            <th> {{$art->indexation}} </th>
                            <th> {{$art->site_revue}} </th>
                            
                        </tr> 
                        @endforeach                                   
                        </tbody>
                    </table>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5 shadow p-3 mb-5 bg-body rounded  wow fadeInDown">
      <form action="/store-art" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
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
            <h1>Création article scientifique</h1>
                <legend>
                    <span><i class="bi bi-file-earmark-fill"></i>Informations article :</span>
                </legend> 
                <hr>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label class="fw-bold">Année</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" name="annee" placeholder="2022" class="form-control mt-2 " >
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="fw-bold">Titre</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" name="titre" placeholder="Titre" class="form-control mt-2 " >
                    </div>
                </div><br>
                <div></div>
                <div class="col-sm-12 mt-2">
                    <div class="row ">
                        <div class="col-sm-6 form-group ">
                            <label class="fw-bold">Lien DOI de l'article scientifique</label>
                            <input type="text" name="lien" placeholder="Lien DOI" class="form-control mt-2 " >
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="fw-bold ">Fichier (PDF, Taille maximale: 1024 ko)</label>
                            <input type="file" name="file" class="form-control mt-2" >
                        </div><br>
                    </div><br>
                    <div class="col-sm-12 form-group ">
                        <label class="fw-bold ">Date publication</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="date" class="form-control mt-2 " name="date" id="datediplome" >
                    </div><br>
                    <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Interne:</span></legend>   
                   <hr>
                    <div class="from-group">
                        <div id="auteur_article">
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
                    <legend><span><i class="bi bi-person-fill"></i>Auteur(s) Externe :</span></legend>   
                    <hr>
                    <div class="from-group">
                        <div id="auteur_externe">
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
            
                    <legend><br><span><i class="bi bi-book-fill"></i>Informations journal </span></legend>   
                    <hr>
                    <div class="form-group"><br>
                        <label class="control-label fw-bold">Titre du journal</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" class="form-control mt-2" name="titre_journal" placeholder="Titre du journal">
                    </div>
                    <!--<div class="form-group"><br>
                        <label class="control-label fw-bold">Liste des journaux (Chercher et séléctionner un titre existant)</label>
                        <select id="revues" size="10" tabindex="2" class="form-control mt-2"></select>
                    </div>-->
                    <div class="form-group"><br>
                        <label class="control-label fw-bold">Quartile du journal: 0%----Q1----25----Q2----50----Q3----75----Q4----100% <span class="fw-normal">(Cliquer ici pour plus d'informations)</span></label>
                        <select name="quartile" id="" class="form-control mt-2">
                            <option value="Q1">Q1: Top 25% de la distribution des facteurs d'impact</option>
                            <option value="Q2">Q2: Entre top 50% et 25% de la distribution des facteurs d'impact</option>
                            <option value="Q3">Q3: Entre top 75% to top 50% de la distribution des facteurs d'impact</option>
                            <option value="Q4">Q4: Moins de 25% de la distribution des facteurs d'impact </option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label fw-bold">Volume</label>
                                <input type="text" class="form-control mt-2" name="volume" placeholder="Volume">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label fw-bold">Facteur d'impact</label>
                                <input type="text" class="form-control mt-2" name="impact" placeholder="Facteur d'impact">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label fw-bold">Indexation</label>
                                <span class="obligatoryFieldMark">*</span>
                                <select name="indexation" class="form-control mt-2">
                                    <option value="WOS">WOS</option>
                                    <option value="SCOPUS">SCOPUS</option>
                                    <option value="Elsevier">Elsevier</option>
                                    <option value="Non indexé">Non indexé</option>
                                    <option value="Autres">Autres</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label fw-bold">Site de la revue</label>
                                <input type="text" class="form-control mt-2" name="site_revue" placeholder="Site de la revue">
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                    </div> 
                </div>
        </div>
    </div><br>
    </form>
</div>
</div>
<script>
    $(document).ready(function () {
    var i = 1 ;
    $("#add_btn").click(function (e) { 
        e.preventDefault();
        if(i<10){
        i++;
        $("#auteur_article").append(`<div class="from-group">
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
                                $("#auteur_article").append(`<span style="color:red;"> Vous avez dépacer la limite de nombre d'auteurs </span><br>`); 
                            }
                        
        
    });
    });
    $(document).ready(function () {
    var i = 1 ;
    $("#add_externe").click(function (e) { 
        e.preventDefault();
        if(i<10){
        i++;
        $("#auteur_externe").append(`<div class="from-group">
                        <div id="auteur_externe">
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
                        $("#auteur_externe").append(`<span style="color:red;"> Vous avez dépacer la limite de nombre d'auteurs externes </span><br>`);
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