@extends('MembreDashboard.Fonctionnalites.layouts.sidebar')
@section('title')
  Envoyer message
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
                <a  class="text-muted fw-light" href="domainManager"> Envoyer Message </a>
          </div><!-- /.col -->     
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
        <div class="col">
        <div class="card border-dark shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center h3" style="color:#22577E">Messagerie</div>
            @foreach($messages as $msg)
            <div class="card-body">
              <span class="text-muted fw-light">You:</span> {{$msg->msg}}
            </div>
            @endforeach
            <div class="card-body text-dark">
                <form action='/store-msg' method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="col-sm-10 mt-3 mx-1">
                        <hr> 
                        <div class="form-group">
                            <textarea class="form-control mt-2" name="msg" rows="10" placeholder="Envoyer messager à l'administrateur de site...."></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-outline-success m-3 w-25" value="upload" id="submit" name="submit">Envoyer</button>	
                        </div> 
                    </div>
                </form>
                
            </div>
        </div>
        </div>
    </section>
</div>
@endsection