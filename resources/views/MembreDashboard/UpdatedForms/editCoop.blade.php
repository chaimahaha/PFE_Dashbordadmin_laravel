@extends('MembreDashboard.Fonctionnalites.layouts.sidebar')
@section('title')
Editer coopération {{$cooperations->id}}
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
                <a  class="text-muted fw-light" href="cooperationManager"> Gestion des coopérations </a>
                <span class="text-muted fw-light" > /</span> Editer coopération</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="col">
          <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
            <div class="card-body text-dark">
                <form action="/update-coop{{$cooperations->id}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  @method('PUT')
                    <div class="col-sm-10 mt-3 mx-1">
                        <h1>Mettre à jour d'une coopération</h1>
                        <hr>
                        <div class="form-group">
                            <label class="fw-bold">Type</label>
                            <span class="obligatoryFieldMark">*</span>
                            <select name="type" id="type" class="form-control mt-2">
                              <option  selected>{{$cooperations->type}}</option>
                                <option value="nationale">Coopération Nationale</option>
                                <option value="internationale">Coopération Internationale</option>
                            </select>
                        </div><br>  
                        <div class="from-group">
                          <div id="intervenant_national">
                            <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Internevant national (s) </label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="intervenantnat" class="form-control mt-2 " placeholder="Internevant 1,Internevant 2.." value="{{$cooperations->intervenantnat}}">
                            </div>  
                            </div><br>      
                          </div>
                        </div>
                        <div class="from-group">
                          <div id="intervenant_international">
                            <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="control-label fw-bold">Internevant international(s)</label>
                                <span class="obligatoryFieldMark">*</span>
                                <input type="text" name="intervenantin" class="form-control mt-2 " placeholder="Internevant 1,Internevant 2.." value={{$cooperations->intervenantin}}>
                            </div>     
                            </div><br>           
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Sujet</label>
                            <span class="obligatoryFieldMark">*</span>
                            <textarea name="sujet" class="form-control mt-2" cols="20" rows="5" >{{$cooperations->sujet}}</textarea>
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Institution</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="text" class="form-control mt-2" name="institution" placeholder="Institution" value={{$cooperations->institution}}>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="fw-bold">Date debut</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="date" class="form-control mt-2 " name="date_start" id="date" value="{{$cooperations->date_start}}">
                        </div><br>
                        <div class="form-group">
                            <label class="fw-bold">Date fin</label>
                            <span class="obligatoryFieldMark">*</span>
                            <input type="date" class="form-control mt-2 " name="date_end" id="date" value="{{$cooperations->date_end}}" >
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