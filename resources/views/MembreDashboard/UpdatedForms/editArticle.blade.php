@extends('MembreDashboard.Fonctionnalites.postsManager')
@section('title')
  Editer article {{$articles->id}}
@endsection
@section('post')
<div id="article_scientifique" >
    <form action="/update-art{{$articles->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PUT')
        <div class="col-sm-10 mt-3 mx-2">
            <h1>Mettre à jour l'article scientifique</h1>
                <legend>
                    <span><i class="bi bi-file-earmark-fill"></i>Informations article :</span>
                </legend> 
                <hr>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label class="fw-bold">Année</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" name="annee" placeholder="2022" class="form-control mt-2 " value="{{$articles->annee}}" >
                    </div>
                    <div class="col-sm-6 form-group">
                        <label class="fw-bold">Titre</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" name="titre" placeholder="Titre" class="form-control mt-2 " value={{$articles->titre}}>
                    </div> <br>
                    <div class="row ">
                        <div class=" form-group ">
                            <label class="fw-bold">Lien DOI de l'article scientifique</label>
                            <input type="text" name="lien" placeholder="Lien DOI" class="form-control mt-2 " value={{$articles->lien}} >
                        </div>
                    </div><br>
                    <div class=" form-group ">
                        <label class="fw-bold ">Date publication</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="date" class="form-control mt-2 " name="date" id="datediplome" value={{$articles->date}} >
                    </div><br>
                </div><br>
                <div></div>
                <div class="col-sm-12 mt-2">
                    <legend><span><i class="bi bi-person-fill"></i> Auteur(s) Interne:</span></legend>   
                   <hr>
                    <div class="from-group">
                        <div id="auteur_article">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur(s)</label>
                                    <span class="obligatoryFieldMark">*</span><input type="text" name="auteur" class="form-control mt-2 " placeholder="Auteur 1,Auteur 2.." value={{$articles->auteur}}>
                                </div>     
                                <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail auteur(s)</label>
                                    <span class="obligatoryFieldMark">*</span><input type="text" name="mail" class="form-control mt-2 " placeholder="Mail 1,Mail 2..." value={{$articles->mail}}>
                                </div>
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
                                    <label class="control-label fw-bold">Auteur externe (s)</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteurex" class="form-control mt-2 " placeholder="Auteur_externe 1,Auteur_externe 2.." value={{$articles->auteurex}}>
                                </div>     
                                <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail externe (s)</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mailex" class="form-control mt-2 " placeholder="Mail_externe 1,Mail_externe 2.." value={{$articles->mailex}}>
                                </div>    
                            </div><br>        
                        </div>
                    </div>
            
                    <legend><br><span><i class="bi bi-book-fill"></i>Informations journal </span></legend>   
                    <hr>
                    <span class="fw-bold">Recherche journal</span>
                    <div class="form-group"><br>
                        <label class="control-label fw-bold">Titre du journal</label>
                        <span class="obligatoryFieldMark">*</span>
                        <input type="text" class="form-control mt-2" name="titre_journal" placeholder="Titre du journal" value={{$articles->titre_journal}}>
                    </div>
                    <!--<div class="form-group"><br>
                        <label class="control-label fw-bold">Liste des journaux (Chercher et séléctionner un titre existant)</label>
                        <select id="revues" size="10" tabindex="2" class="form-control mt-2"></select>
                    </div>-->
                    <div class="form-group"><br>
                        <label class="control-label fw-bold">Quartile du journal: 0%----Q1----25----Q2----50----Q3----75----Q4----100% <span class="fw-normal">(Cliquer ici pour plus d'informations)</span></label>
                        <select name="quartile" id="" class="form-control mt-2">
                            <option selected> {{$articles->quartile}}  </option>
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
                                <input type="text" class="form-control mt-2" name="volume" placeholder="Volume" value={{$articles->volume}}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label fw-bold">Facteur d'impact</label>
                                <input type="text" class="form-control mt-2" name="impact" placeholder="Facteur d'impact" value={{$articles->impact}}>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label fw-bold">Indexation</label>
                                <span class="obligatoryFieldMark">*</span>
                                <select name="indexation" class="form-control mt-2">
                                    <option selected>{{$articles->indexation}}</option>
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
                                <input type="text" class="form-control mt-2" name="site_revue" placeholder="Site de la revue" value={{$articles->site_revue}}>
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
@endsection