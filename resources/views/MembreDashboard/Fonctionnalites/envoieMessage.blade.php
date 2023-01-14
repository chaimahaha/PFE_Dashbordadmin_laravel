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
              <button class="btn btn" onclick="consulterListe()">Voir message envoyer</button>
              <div id="msg_env" style="display: none">  
              @foreach($messages as $msg)
                  <div class="card-body">
                    <span class="text-muted fw-light">You:</span> {{$msg->msg}}
                    <br>
                      @if ($msg->is_lu==true)
                      <span class="text-info text-sm"> Vu .. je vais vous contacter par mail </span>    
                      @else
                      <span class="text-muted fw-lighter"></span>    
                      @endif
                  </div>
                  @endforeach
              </div>
                  <div class="card-body text-dark">
                    <form action='/store-msg' method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="col-sm-10 mt-3 mx-1">
                        <hr> 
                        <div class="form-group">
                          <textarea class="form-control mt-2" name="msg" rows="7" placeholder="Envoyer messager à l'administrateur...."></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-outline-success m-3 w-25" value="upload" id="submit" name="submit">Envoyer</button>	
                        </div>                                    
                    </form>              
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
<script>
 let lst = document.getElementById("msg_env");
function consulterListe(){
  if(lst.style.display === 'none'){
      lst.style.display='block'; 
  }
  else
  {lst.style.display ='none';}
}
</script>
@endsection