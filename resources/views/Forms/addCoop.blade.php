@extends('layouts.sidebar')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajout coopération</h1>
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
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center h4" style="color:#22577E">Coopération</div>
            <div class="card-body text-dark">
                <form action="insert_cooperation.php" method="post" enctype="multipart/form-data">
                    <div class="col-sm-10 mt-3 mx-1">
                        <h1>Création coopération</h1>
                        <hr>
                        <div class="form-group">
                            <label class="fw-bold">Type</label>
                            <span class="obligatoryFieldMark">*</span>
                            <select name="type" id="type" class="form-control mt-2">
                                <option value="nationale">Coopération Nationale</option>
                                <option value="internationale">Coopération Internationale</option>
                            </select>
                        </div><br>
                        
                        
                        <div class="from-group">
                          <div id="intervenant_national">
                            <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Internevant national</label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="intervenant_natio[]" class="form-control mt-2 " placeholder="Internevant 1">
                            </div>     
                             
                            </div><br> 
                                      
                          </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="add_intervenant_btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter Internevant</button>
                        <br><br>
                        <div class="from-group">
                          <div id="intervenant_international">
                            <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Internevant international</label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="intervenant_inter[]" class="form-control mt-2 " placeholder="Internevant 1">
                            </div>     
                             
                            </div><br> 
                                      
                          </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="add_intervenant_externe_btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter Internevant</button>
                        <br><br>
                        <div class="form-group">
                            <label class="fw-bold">Sujet</label>
                            <span class="obligatoryFieldMark">*</span>
                            <textarea name="sujet" class="form-control mt-2" cols="20" rows="5"></textarea>
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Institution</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="institution" placeholder="Institution">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Contrat de coopération (PDF)</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="file" name="contrat" class="form-control mt-2" >
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Date debut</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="date" class="form-control mt-2 " name="date_debut" id="date" >
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Date fin</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="date" class="form-control mt-2 " name="date_fin" id="date" >
                        </div><br>
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-outline-success mb-3 w-25" value="upload" id="submit" name="submit">Submit</button>	
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

</div>
@endsection