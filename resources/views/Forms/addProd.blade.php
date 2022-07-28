@extends('layouts.sidebar')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajout publication</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
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
           <button class="btn btn-outline-dark mx-2" id="show_article" onclick="showThese()"><a class="nav-link " aria-current="true" >Thèse</a></button> 
          </li>
          <li class="nav-item " id="paper">
          <button class="btn btn-outline-dark mx-2" id="show_ouvrage" onclick="showHabilitation()"><a class="nav-link " >Habilitation</a></button>
          </li>
          <li class="nav-item " id="paper">
          <button class="btn btn-outline-dark mx-2" id="show_chapitre" onclick="showPfe()"><a class="nav-link " >PFE</a></button> 
          </li>

        </ul>
      </div>

        <div id="these" >
          <form action="insert_these.php" method="post" enctype="multipart/form-data">
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
                  <select name="annee" class="form-control mt-2">
                    <option value="2022">2022</option>
                  </select>
              </div><br>

              <div class="form-group">
                <label class="fw-bold">Mémoire de thèse soutenu (fichier PDF qui contient la page de garde, taille maximale 1MO</label>
                <span class="obligatoryFieldMark">*</span>
                <input type="file" name="these" class="form-control mt-2  " >
              </div><br>

              <div class="form-group">
                <label class="fw-bold">Sujet</label>
                <span class="obligatoryFieldMark">*</span>
                <textarea name="sujet" class="form-control mt-2" cols="20" rows="5"></textarea>
              </div><br>

              <div class="form-group">
                <label class="fw-bold">Année de la première inscription</lable>
                <span class="obligatoryFieldMark">*</span>
                <input type="number" class="form-control mt-2" name="anneeinscri">
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

    
    <div id="hab" style="display:none" >
      <form action="insert_habilitation.php" method="post" enctype="multipart/form-data">
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
                    <select name="annee" class="form-control mt-2 ">
                      <option value="2022">2022</option>
                    </select>
                </div><br>
                                      
                <div class="col-sm-6 form-group">
                  <label class="fw-bold">Fichier (PDF, Taille maximale: 1024 ko)</label>
                  <input type="file" name="fichier" class="form-control mt-4" >
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



<div id="pfe" style="display:none">
<form action="insert_pfe.php" method="post" enctype="multipart/form-data">
<div class="col-sm-10 mt-3 mx-2">   
      <h1>PFE</h1>
      <hr>
      <div class="form-group">
        <label class="fw-bold">Titre</label>
        <span class="obligatoryFieldMark">*</span>
        <input type="text" name="titre" class="form-control mt-2" placeholder="Titre">
      </div><br>

      <div class="col-sm-6 form-group">
        <label class="fw-bold">Fichier (PDF)</label>
        <input type="file" name="fichier" class="form-control mt-4" >
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
      <input type="date" name="debut" id="debut" class="form-control mt-2">
      </div><br>
      <div class="form-group">
      <label class="fw-bold">Date fin de PFE</label>
      <input type="date" name="fin" id="debut" class="form-control mt-2">
      </div><br>
      <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit"  onclick="sweet()">Submit</button> 
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

@endsection