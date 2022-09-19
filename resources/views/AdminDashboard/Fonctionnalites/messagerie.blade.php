@extends('AdminDashboard.layouts.sidebar')
@section('title')
  Messagerie
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Messagerie /</span></h4>
  <div class="card">
    <h5 class="card-header">Messages</h5>
    @foreach ($messages as $msg)
        <div class="table-responsive text-nowrap">
          
         <span class="text-muted fw-light text-primary m-2"> {{\App\Models\User::findOrFail($msg->id_user)->nom}} {{\App\Models\User::findOrFail($msg->id_user)->prenom}} :</span> 
         
         {{$msg->msg}}
         <div class="dropdown d-flex position-absolute end-0  translate-middle">
          <button type="button" class="btn  dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu ">
            @if(!$msg->trashed())
              <a class="dropdown-item" href="{{url('deletemsg?id='.$msg->id)}};"
              ><i class="bx bx-trash me-1"></i> Delete</a>
            @endif
          </div>
        </div>
    </div> <hr> <br>
    @endforeach
    
  </div>
</div>
@endsection