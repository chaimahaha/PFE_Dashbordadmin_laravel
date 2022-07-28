@extends('layouts.sidebar')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-sm-8">
            <h4 class="fw-bold py-3 mb-4" >
                <span >Fonctionnalités </span>
                 <span class="text-muted fw-light" > /</span>
                <a  style="color:#92b1f5" href="postsManager"> Gestion des publications </a>
                <span class="text-muted fw-light" > /</span> Ajouter publication</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!--
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
   </button>
</div>
<section class="content">
    <div class="container-fluid">
    <div class="col">
<div class="card border-dark shadow p-3 mb-5 bg-body rounded" >
  <div class="card-header fw-bold">
    <ul class="nav  card-header-tabs justify-content-center" >
      <li class="nav-item " id="paper">
       <button class="btn btn-outline-dark mx-2" id="show_article" onclick="showArticle()"><a class="nav-link " aria-current="true" >Article scientifique</a></button> 
      </li>
      <li class="nav-item " id="paper">
      <button class="btn btn-outline-dark mx-2" id="show_ouvrage" onclick="showOuvrage()"><a class="nav-link " >Ouvrage scientifique</a></button>
      </li>
      <li class="nav-item " id="paper">
      <button class="btn btn-outline-dark mx-2" id="show_chapitre" onclick="showChapitre()"><a class="nav-link " >Chapitre d'ouvrage</a></button> 
      </li>
      <li class="nav-item " id="paper">
      <button class="btn btn-outline-dark mx-2" id="show_these" onclick="showBrevet()"><a class="nav-link " >Brevet</a></button> 
      </li>
      <li class="nav-item " id="paper">
      <button class="btn btn-outline-dark mx-2" id="show_these" onclick="showConferance()"><a class="nav-link " >Conférence</a></button> 
      </li>
      
     
    </ul>
  </div>

 
  <div id="brevet" style="display:none" >
    <form action="insert_brevet.php" method="post" enctype="multipart/form-data" >  
    <div class="col-sm-10 mt-3 mx-2">
        <h1>Création de brevet</h1>
        <hr>
        <div class="form-group">
          <label class="fw-bold">Titre</label>
          <span class="obligatoryFieldMark">*</span>
          <input type="text" name="titre" class="form-control mt-2" placeholder="Titre">
        </div><br>
        <div class="form-group">
            <label class="fw-bold">Année</label>
            <span class="obligatoryFieldMark">*</span>
            <select name="annee" class="form-control mt-2">
              <option value="2022">2022</option>
            </select>
        </div><br>
        <legend>
                <span>
                  <i class="bi bi-person-fill"></i>
                  Auteur(s) Interne :
                </span>
              </legend>   
          <hr>
          <div class="from-group">
            <div id="auteur_brevet">
              <div class="row">
                <div class="col-sm-6 form-group">
                 <label class="control-label fw-bold">Auteur 1</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Mail auteur 1</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                </div>
              </div>
            </div>
          </div><br>

          <button type="button" class="btn btn-primary" id="add_brevet_btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un auteur</button>
          <br><br>
          <legend>
              <span>
                <i class="bi bi-person-fill"></i>
                                Auteur(s) Externe :
              </span>
          </legend>   
          <hr>

          <div class="form-group">
            <div id="externe_brevet">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Auteur externe 1</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label fw-bold">Mail externe 1</label>
                  <span class="obligatoryFieldMark">*</span>
                  <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary" id="btn_externe_brevet"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un auteur</button>
      <br><br>
        <div class="form-group">
          <label class="fw-bold">Fichier (taille maximale 1MO)</label>
          <input type="file" name="fichier" class="form-control mt-2  " >
        </div><br>

        <div class="form-group">
          <label class="fw-bold">Sujet</label>
          <textarea name="sujet" class="form-control mt-2" cols="20" rows="5"></textarea>
        </div><br>
        <div class="form-group">
          <label class="fw-bold">Date</label>
          <input name="date" class="form-control mt-2" type="date"></input>
        </div><br>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
        </div>
    </form>           
</div>

</div>
<div id="conference" style="display:none">
  <form action="insert_conference.php" method="post" enctype="multipart/form-data">
  <div class="col-sm-10 mt-3 mx-2">
                  <h1>Création Conférence</h1>
                  <legend>
                          <span>
                            <i class="bi bi-file-earmark-fill"></i>
                              Informations conférence :
                          </span>
                        </legend> 
                        <hr>
                      <div class="row">
                        <div class="col-sm-6 form-group">
                              <label class="fw-bold">Année</label>
                              <span class="obligatoryFieldMark">*</span>
                              <select name="annee" class="form-control mt-2 ">
                                  <option value="2022">2022</option>
                              </select>
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
                                  <label class="fw-bold ">Date</label>
                                  <span class="obligatoryFieldMark">*</span>
                                  <input type="date" class="form-control mt-2 " name="date" id="datediplome" >
                              </div>
                              <div class="col-sm-6 form-group">
                                <label class="fw-bold ">Fichier (PDF, Taille maximale: 1024 ko)</label>
                                <input type="file" name="conference" class="form-control mt-2" >
                              </div><br>

                          </div><br>
                         

                          <legend>
                            <span>
                              <i class="bi bi-person-fill"></i>
                              Auteur(s) Interne:
                            </span>
                          </legend>   
                     <hr>
                  
                  <div class="from-group">
                    <div id="auteur_conference">
                      <div class="row">
                        <div class="col-sm-6 form-group">
                          <label class="control-label fw-bold">Auteur 1</label>
                          <span class="obligatoryFieldMark">*</span>
                          <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                        </div>     
                        <div class="col-sm-6 form-group">
                          <label class="control-label fw-bold">Mail auteur 1</label>
                          <span class="obligatoryFieldMark">*</span>
                          <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                        </div>    
                             
                      </div><br> 
                                
                    </div>
                  </div>
                  
                 
                            
                            
    <button type="button" class="btn btn-primary" id="conf_btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un auteur</button>
    <br><br>
                          <legend>
                            <span>
                              <i class="bi bi-person-fill"></i>
                              Auteur(s) Externe :
                            </span>
                          </legend>   
                     <hr>
                  <div class="from-group">
                    <div id="conference_externe">
                      <div class="row">
                        <div class="col-sm-6 form-group">
                          <label class="control-label fw-bold">Auteur externe 1</label>
                          <span class="obligatoryFieldMark">*</span>
                          <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                        </div>     
                        <div class="col-sm-6 form-group">
                          <label class="control-label fw-bold">Mail externe 1</label>
                          <span class="obligatoryFieldMark">*</span>
                          <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                        </div>    
                             
                      </div><br> 
                                
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary" id="conf_externe"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un auteur</button>
    <br><br>
                            
                     
                                  <legend><br>
                                      <span>
                                      <i class="bi bi-book-fill"></i>
                                      Informations conférence :
                                  </span>
                                  </legend>   
                                  <hr>
                                  
                                  <div class="form-group"><br>
                                      <label class="control-label fw-bold">Conference name</label>
                                      <span class="obligatoryFieldMark">*</span>
                                      <input type="text" class="form-control mt-2" name="name" placeholder="Titre du conférence">
                                  </div>
                                  
                                
                                  <div class="form-group"><br>
                                      <label class="control-label fw-bold">Classe</label>
                                      <div class="form-check">
                                          <input class="form-check-input" type="radio" name="classe" id="female" value="a"  >
                                          <label class="form-check-label " for="female" >a</label>
                                      </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="classe" id="male" value="b" >
                                          <label class="form-check-label " for="male" >b</label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="classe" id="male" value="c" >
                                          <label class="form-check-label " for="male" >c</label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="classe" id="male" value="Internationale" >
                                          <label class="form-check-label " for="male" >Internationale</label>
                                        </div>
                                  </div><br>

                                  
                                  <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                                  </div> 
                            </div>  
                        </form>
        
                    </div>
                    
                    </div>
                    <div id="chapitre_ouvrage" style="display:none">  
                      <form action="insert_chapitre.php" method="post">  
                          <div class="col-sm-10 mt-3 mx-2">
                          <h1>Création de chapitre d'ouvrage</h1>
                          <hr>
                          <div class="form-group">
                            <label class="fw-bold">Année</label>
                            <span class="obligatoryFieldMark">*</span>
                            <select name="annee" class="form-control mt-2 ">
                              <option value="2022">2022</option>
                            </select>
                          </div><br>
                          <legend>
                            <span>
                              <i class="bi bi-person-fill"></i>
                              Auteur(s) Interne :
                            </span>
                          </legend>   
                          <hr>
                                      
                          <div class="from-group">
                            <div id="auteur_chapitre_ouvrage">
                            <div class="row">
                              <div class="col-sm-6 form-group">
                              <label class="control-label fw-bold">Auteur 1</label>
                              <span class="obligatoryFieldMark">*</span>
                              <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                            </div> 
                            <div class="col-sm-6 form-group">
                              <label class="control-label fw-bold">Auteur 1</label>
                              <span class="obligatoryFieldMark">*</span>
                              <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Auteur 1">
                            </div>                    
                          </div><br> 
                                                    
                        </div>
                        <button type="button" class="btn btn-primary" id="add_chapitre_btn"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
                        <br><br>
                        <legend>
                                                <span>
                                                  <i class="bi bi-person-fill"></i>
                                                  Auteur(s) Externe :
                                                </span>
                                              </legend>   
                                         <hr>
                                      <div class="from-group">
                                        <div id="externe_chapitre">
                                          <div class="row">
                                            <div class="col-sm-6 form-group">
                                              <label class="control-label fw-bold">Auteur externe 1</label>
                                              <span class="obligatoryFieldMark">*</span>
                                              <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                                            </div>     
                                            <div class="col-sm-6 form-group">
                                              <label class="control-label fw-bold">Mail externe 1</label>
                                              <span class="obligatoryFieldMark">*</span>
                                              <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                                            </div>    
                                                 
                                          </div><br> 
                                                    
                                        </div>
                                      </div>
                                      <button type="button" class="btn btn-primary" id="btn_chap"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
                        <br><br>
                                                
                                                
                       
                         
                          <div class="form-group">
                            <label  class="fw-bold">Titre</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="titre" placeholder="Titre ">
                          </div><br>
              
                          <div class="form-group">
                            <label  class="fw-bold">Éditeur</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="editeur" placeholder="Éditeur ">
                          </div><br>
              
                          <div class="form-group">
                            <label  class="fw-bold">Lien éditeur</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="lien" placeholder="Lien éditeur ">
                          </div><br>
              
                          <div class="form-group">
                            <label  class="fw-bold">Édition</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="edition" placeholder="Édition ">
                          </div><br>
              
                          <div class="form-group">
                            <label  class="fw-bold">ISBN/Issn</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="isbn" placeholder="ISBN/Issn">
                          </div><br>
              
                          <div class="form-group">
                            <label  class="fw-bold">Date</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="date" class="form-control mt-2" name="date">
                          </div><br>
                          <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>  
                          </div>
                              </div>    
                            </form>           
                        </div>
                  
                        </div>
                  
                        <div id="ouvrage_scientifique" style="display:none">
                             <form action="insert_ouvrage.php" method="post" >
                               <div class="col-sm-10 mt-3 mx-2">
                                  <h1>Création ouvrage</h1>
                                  <hr>
                                    <div class="form-group">
                                      <label class="fw-bold">Année</label>
                                      <span class="obligatoryFieldMark">*</span>
                                      <select name="annee" class="form-control mt-2 ">
                                          <option value="2022">2022</option>
                                      </select>
                                    </div><br>
                                    <legend>
                                      <span>
                                        <i class="bi bi-person-fill"></i>
                                        Auteur(s) Interne :
                                      </span>
                                    </legend>   
                                <hr>
                                          
                              <div class="from-group">
                                <div id="auteur_ouvrage">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Auteur 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                                  </div>  
                                  <div class="col-sm-6 form-group">
                                    <label class="control-label fw-bold">Mail auteur 1</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                                  </div>  
                  
                  
                              </div><br> 
                                                        
                            </div>
                                                    
                                                    
                            <button type="button" class="btn btn-primary" id="add_ouvrage_btn"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
                            <br><br>
                            <legend>
                                                    <span>
                                                      <i class="bi bi-person-fill"></i>
                                                      Auteur(s) Externe :
                                                    </span>
                                                  </legend>   
                                             <hr>
                                          <div class="from-group">
                                            <div id="externe_ouvrage">
                                              <div class="row">
                                                <div class="col-sm-6 form-group">
                                                  <label class="control-label fw-bold">Auteur externe 1</label>
                                                  <span class="obligatoryFieldMark">*</span>
                                                  <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                                                </div>     
                                                <div class="col-sm-6 form-group">
                                                  <label class="control-label fw-bold">Mail externe 1</label>
                                                  <span class="obligatoryFieldMark">*</span>
                                                  <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                                                </div>    
                                                     
                                              </div><br> 
                                                        
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-primary" id="btn_externe"><i class="bi bi-plus-circle"></i> Ajouter un auteur</button>
                            <br><br>
                  
                                                    <div class="form-group">
                                                      <label  class="fw-bold">Titre</label>
                                                      <span class="obligatoryFieldMark">*</span>
                                                      <input type="text" class="form-control mt-2" name="titre" placeholder="Titre ">
                                                    </div><br>
                                                    <div class="form-group">
                                                      <label  class="fw-bold">Éditeur</label>
                                                      <span class="obligatoryFieldMark">*</span>
                                                      <input type="text" class="form-control mt-2" name="editeur" placeholder="Éditeur ">
                                                    </div><br>
                                                    <div class="form-group">
                                                      <label  class="fw-bold">Lien éditeur</label>
                                                      <span class="obligatoryFieldMark">*</span>
                                                      <input type="text" class="form-control mt-2" name="lien" placeholder="Lien éditeur ">
                                                    </div><br>
                                                    <div class="form-group">
                                                      <label  class="fw-bold">Édition</label>
                                                      <span class="obligatoryFieldMark">*</span>
                                                      <input type="text" class="form-control mt-2" name="edition" placeholder="Édition ">
                                                    </div><br>
                                                    <div class="form-group">
                                                      <label  class="fw-bold">ISBN/Issn</label>
                                                      <span class="obligatoryFieldMark">*</span>
                                                      <input type="text" class="form-control mt-2" name="isbn" placeholder="ISBN/Issn">
                                                    </div><br>
                                                    <div class="form-group">
                                                      <label  class="fw-bold">Date</label>
                                                      <span class="obligatoryFieldMark">*</span>
                                                      <input type="date" class="form-control mt-2" name="date">
                                                    </div><br>
                                                    <div class="d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                                                    </div>
                                  </div>
                                         
            </form>           
        </div>
      </div>

      <div id="article_scientifique" >
            <form action="insert_article.php" method="post" enctype="multipart/form-data">
                        <div class="col-sm-10 mt-3 mx-2">
                        <h1>Création article scientifique</h1>
                        <legend>
                                <span>
                                  <i class="bi bi-file-earmark-fill"></i>
                                    Informations article :
                                </span>
                              </legend> 
                              <hr>
                            <div class="row">
                              <div class="col-sm-6 form-group">
                                    <label class="fw-bold">Année</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <select name="annee" class="form-control mt-2 ">
                                        <option value="2022">2022</option>
                                    </select>
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
                                        <input type="text" name="doi" placeholder="Lien DOI" class="form-control mt-2 " >
                                    </div>
                                    <div class="col-sm-6 form-group">
                                      <label class="fw-bold ">Fichier (PDF, Taille maximale: 1024 ko)</label>
                                      <input type="file" name="article" class="form-control mt-2" >
                                    </div><br>

                                </div><br>
                                <div class="col-sm-6 form-group ">
                                    <label class="fw-bold ">Date publication</label>
                                    <span class="obligatoryFieldMark">*</span>
                                    <input type="date" class="form-control mt-2 " name="date" id="datediplome" >
                                </div><br>

                                <legend>
                                  <span>
                                    <i class="bi bi-person-fill"></i>
                                    Auteur(s) Interne:
                                  </span>
                                </legend>   
                           <hr>
                        
                        <div class="from-group">
                          <div id="auteur_article">
                            <div class="row">
                              <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Auteur 1</label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="auteur[]" class="form-control mt-2 " placeholder="Auteur 1">
                              </div>     
                              <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Mail auteur 1</label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="mail[]" class="form-control mt-2 " placeholder="Mail 1">
                              </div>    
                                   
                            </div><br> 
                                      
                          </div>
                        </div>
    
          <button type="button" class="btn btn-primary" id="add_btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un auteur</button>
          <br><br>
                                <legend>
                                  <span>
                                    <i class="bi bi-person-fill"></i>
                                    Auteur(s) Externe :
                                  </span>
                                </legend>   
                           <hr>
                        <div class="from-group">
                          <div id="auteur_externe">
                            <div class="row">
                              <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Auteur externe 1</label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="auteur_externe[]" class="form-control mt-2 " placeholder="Auteur_externe 1">
                              </div>     
                              <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Mail externe 1</label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="mail_externe[]" class="form-control mt-2 " placeholder="Mail_externe 1">
                              </div>    
                                   
                            </div><br> 
                                      
                          </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="add_externe"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un auteur</button>
          <br><br>
                                  
                           
                                        <legend><br>
                                            <span>
                                            <i class="bi bi-book-fill"></i>
                                            Informations journal :
                                        </span>
                                        </legend>   
                                        <hr>
                                        <span class="fw-bold">Recherche journal</span>
                                        <div class="form-group"><br>
                                            <label class="control-label fw-bold">Titre du journal</label>
                                            <span class="obligatoryFieldMark">*</span>
                                            <input type="text" class="form-control mt-2" name="titre_journal" placeholder="Titre du journal">
                                        </div>
                                        
                                        <div class="form-group"><br>
                                            <label class="control-label fw-bold">Liste des journaux (Chercher et séléctionner un titre existant)</label>
                                            <select id="revues" size="10" tabindex="2" class="form-control mt-2"></select>
                                        </div>
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
                                </div><br>
                               
                            </div>

                            
                        </div>
                    </form>
          </div>
      </div>

          
            </div>

    

    


  </div>
        </div>
    </section>

</div>

<script type="text/javaScript">


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
  -->
@endsection